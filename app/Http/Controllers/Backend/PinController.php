<?php

namespace App\Http\Controllers\Backend;

use Datatables;
use App\Models\Pin;
use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PinImportRequest;

class PinController extends Controller {

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
        $vouchers = [];
        $availablePins = $this->pin->notUsed()->count();

        $voucherLabels = Pin::select('voucher')->distinct()->get()->toArray();

        foreach ($voucherLabels as $value)
        {
            $used = DB::table('pins')->select(DB::raw('voucher, count(\'voucher\') as \'count\''))->where('is_used', 1)->groupBy('voucher')->having('voucher', '=', $value['voucher'])->first();
            $available = DB::table('pins')->select(DB::raw('voucher, count(\'voucher\') as \'count\''))->where('is_used', 0)->groupBy('voucher')->having('voucher', '=', $value['voucher'])->first();
            array_push($vouchers, [
                'voucher'   => $value['voucher'],
                'used'      => $used ? $used->count : 0,
                'available' => $available ? $available->count : 0
            ]);
        }

        return view('backend.pin.index', compact('availablePins', 'vouchers'));
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
     * @param PinImportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PinImportRequest $request)
    {
        $rows = $request->getRows();

        $validator = $request->validateRows($rows);

        if ($validator->fails())
        {

            return redirect()->back()->withErrors($validator);

        } else
        {

            foreach ($rows as $row)
            {

                $pin = Pin::create($row);

            }

            return redirect()
                ->route('admin::pin.index')
                ->withSuccess(trans('messages.create_success', ['entity' => 'Pins']));
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

        return Datatables::of($pins)
            ->addColumn('action', function ($pin)
            {
                $button = '<a class="item_delete" data-source="' . route('admin::pin.destroy', $pin->id) . '" data-uk-tooltip="{pos:\'left\'}" title="Delete"><i class="material-icons md-24">&#xE872;</i></a>';

                return $button;
            })->make(true);
    }

    /**
     * @param Pin $pin
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Pin $pin)
    {
        if ($pin->delete())
        {
            return response()->json([
                'Result' => 'OK'
            ]);
        }

        return response()->json([
            'Result' => 'Error'
        ], 500);
    }
}
