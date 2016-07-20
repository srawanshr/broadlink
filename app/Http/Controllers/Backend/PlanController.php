<?php

namespace App\Http\Controllers\Backend;

use App\Models\Plan;
use App\Http\Requests;
use App\Models\Service;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanUpdateRequest;
use App\Http\Requests\PlanCreateRequest;

class PlanController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $plans = Plan::orderBy('order')->get();


        return view('backend.plan.index', compact('plans'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $services = $this->getServicesList();

        if ($services->isEmpty())
            return redirect()->route('admin::service.create')->with('warning', trans('messages.empty', ['entity' => 'Services']));

        return view('backend.plan.create', compact('services'));
    }

    /**
     * @param PlanCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlanCreateRequest $request)
    {
        $plan = DB::transaction(function () use ($request)
        {
            $plan = Plan::create($request->planFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');
                $plan->image()->create(['name' => cleanFileName($image)])->upload($image);
            }

            return $plan;
        });

        return redirect()
            ->route('admin::plan.edit', $plan->slug)
            ->with('success', trans('messages.create_success', ['entity' => 'Plan']));
    }

    /**
     * @param Plan $plan
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit(Plan $plan)
    {
        $services = $this->getServicesList();

        return view('backend.plan.edit', compact('plan', 'services'));
    }

    /**
     * @param Plan $plan
     * @param PlanUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Plan $plan, PlanUpdateRequest $request)
    {
        DB::transaction(function () use ($request, $plan)
        {
            $plan->update($request->planFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                if ($plan->image)
                {
                    $plan->image->upload($image);
                } else
                {
                    $plan->image()->create(['name' => cleanFileName($image)])->upload($image);
                }
            }
        });

        return redirect()->back()->with('success', trans('messages.update_success', ['entity' => 'Plan']));
    }

    /**
     * @param Plan $plan
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Plan $plan)
    {
        if ($plan->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSortOrder(Request $request)
    {
        $order = $request->get('order');

        foreach ($order as $order => $id)
        {
            $plan = Plan::findOrFail($id);
            $plan->order = $order;
            $plan->save();
        }

        return response()->json([
            'Result'  => 'OK',
            'Message' => trans('messages.update_success', ['entity' => 'Order'])
        ]);
    }

    /**
     * @return mixed
     */
    private function getServicesList()
    {
        $services = Service::active()->orderBy('order')->lists('name', 'id');

        return $services;
    }
}
