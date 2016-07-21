<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdminProfileUpdateRequest;
use DB;
use Auth;
use Datatables;
use App\Models\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller {

    /**
     * The admin model instance.
     */
    protected $admin;

    /**
     * AdminController constructor.
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        $admin = DB::transaction(function () use ($request)
        {

            $admin = $this->admin->create($request->adminFillData());

            return $admin;

        });

        return response()->json([
            'Result' => 'OK',
            'Record' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request)
    {
        $admin = $this->admin->findOrFail($request->get('id'));

        $this->dbUpdateAdmin($request, $admin);

        return response()->json([
            'Result' => 'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Requests|Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admin = $this->admin->findOrFail($request->get('id'));

        DB::transaction(function () use ($admin)
        {

            if ($admin->image)
                $admin->image->delete();

            $admin->delete();

        });

        return response()->json([
            'Result' => 'OK'
        ]);
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Admin $admin)
    {
        if ($admin->slug != auth()->guard('admin')->user()->slug)
            return redirect()->route('admin::user.show', auth()->guard('admin')->user()->slug);

        return view('backend.profile.index', compact('admin'));
    }

    /**
     * @param Admin $admin
     * @param AdminProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Admin $admin, AdminProfileUpdateRequest $request)
    {
        $admin = $this->dbUpdateAdmin($request, $admin);

        return redirect()->route('admin::user.show', $admin->slug)->with('success', trans('messages.update_success', ['entity' => 'Profile']));
    }

    /**
     * Process datatables ajax request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adminList(Request $request)
    {
        $order = explode(" ", $request->get('jtSorting', 'id asc'));

        $data = Admin::orderBy($order[0], $order[1])
            ->take($request->get('jtPageSize', 10))
            ->skip($request->get('jtStartIndex', 0));

        return response()->json([
            'Result'           => 'OK',
            'TotalRecordCount' => $data->count(),
            'Records'          => $data->get()->toArray()
        ]);
    }

    /**
     * @param $request
     * @param $admin
     * @return mixed
     */
    private function dbUpdateAdmin($request, $admin)
    {
        $admin = DB::transaction(function () use ($admin, $request)
        {
            $admin->update($request->adminFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                if ($admin->image)
                {
                    $admin->image->upload($image);
                } else
                {
                    $admin->image()->create(['name' => cleanFileName($image)])->upload($image);
                }
            }

            return $admin;
        });

        return $admin;
    }
}
