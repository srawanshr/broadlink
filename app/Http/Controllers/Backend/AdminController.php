<?php

namespace App\Http\Controllers\Backend;

use DB;
use Auth;
use Datatables;
use App\Models\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\ImageManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
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
        $admin = DB::transaction(function() use($request) {

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
     * @param  \App\Services\ImageManager $manager
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, ImageManager $manager)
    {
        $admin = $this->admin->findOrFail($request->get('id'));

        DB::transaction(function() use($admin, $request, $manager) {

            $admin->update($request->adminFillData());

            if($request->has('image'))
                $admin->image()->create([])->upload($request->file('image'));

        });

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

        DB::transaction(function() use($admin) {

            if($admin->image)
                $admin->image->delete();

            $admin->delete();

        });

        return response()->json([
            'Result' => 'OK'
        ]);
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
            'Result' => 'OK',
            'TotalRecordCount' => $data->count(),
            'Records' => $data->get()->toArray()
        ]);
    }
}
