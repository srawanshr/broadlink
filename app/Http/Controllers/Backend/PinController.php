<?php

namespace App\Http\Controllers\Backend;

use Datatables;
use App\Models\Pin;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PinImportRequest;

class PinController extends Controller
{
    /**
     * The pin model instance.
     */
    protected $pin;

    /**
     * PinController constructor.
     * @param Pin $pin
     */
    public function __construct(Pin $pin)
    {
        $this->pin = $pin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\PinImportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PinImportRequest $request)
    {
        $rows = $request->getRows();

        $validator = $request->validateRows($rows);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            foreach($rows as $row) {

                $pin = Pin::create($row);

            }

            return redirect()
                ->route('admin::pin.index')
                ->withSuccess( trans('messages.create_success', [ 'entity' => 'Pins' ]) );
        }

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function pinList(Request $request)
    {
        $pins = Pin::query();

        return Datatables::of($pins)->make(true);
    }
}
