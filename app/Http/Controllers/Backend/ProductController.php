<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::active()->orderBy('order')->get();

        return view('backend.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $services = $this->getServices();

        $plans = $this->getPlans();

        return view('backend.product.create', compact('services', 'plans'));
    }

    /**
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $product = DB::transaction(function () use ($request)
        {
            $product = Product::create($request->productFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');
                $product->image()->create(['name' => cleanFileName($image)])->upload($image);
            }

            return $product;
        });

        return redirect()
            ->route('admin::product.edit', $product->slug)
            ->with('success', trans('messages.create_success', ['entity' => 'Product']));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $services = $this->getServices();

        $plans = $this->getPlans();

        return view('backend.product.edit', compact('product', 'services', 'plans'));
    }

    /**
     * @param Product $product
     * @param ProductUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, ProductUpdateRequest $request)
    {
        DB::transaction(function () use ($request, $product)
        {
            $product->update($request->productFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                if ($product->image)
                {
                    $product->image->upload($image);
                } else
                {
                    $product->image()->create(['name' => cleanFileName($image)])->upload($image);
                }
            }
        });

        return redirect()->back()->with('success', trans('messages.update_success', ['entity'=>'Product']));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        if ($product->delete())
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
     * @return mixed
     */
    public function getServices()
    {
        $services = Service::active()->orderBy('order')->lists('name', 'id');

        return $services;
    }

    /**
     * @return mixed
     */
    public function getPlans()
    {
        $plans = Plan::active()->orderBy('order')->get();

        return $plans;
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
            $service = Product::findOrFail($id);
            $service->order = $order;
            $service->save();
        }

        return response()->json([
            'Result'  => 'OK',
            'Message' => trans('messages.update_success', ['entity' => 'Order'])
        ]);
    }
}