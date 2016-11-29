<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Http\Requests;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller {

    protected $contact;

    /**
     * ContactController constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('backend.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
        $contact = DB::transaction(function () use ($request)
        {
            $contact = $this->contact->create($request->contactFillData());

            return $contact;
        });

        return response()->json([
            'Result' => 'OK',
            'Record' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request)
    {
        $contact = $this->contact->findOrFail($request->get('id'));

        DB::transaction(function () use ($request, $contact)
        {
            $contact->update($request->contactFillData());
        });

        return response()->json([
            'Result' => 'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contact = $this->contact->findOrFail($request->get('id'));

        DB::transaction(function () use ($contact)
        {
            $contact->delete();
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
    public function contactList(Request $request)
    {
        $order = explode(" ", $request->get('jtSorting', 'id asc'));

        $data = $this->contact->orderBy($order[0], $order[1])
            ->take($request->get('jtPageSize', 10))
            ->skip($request->get('jtStartIndex', 0));

        return response()->json([
            'Result'           => 'OK',
            'TotalRecordCount' => $data->count(),
            'Records'          => $data->get()->toArray()
        ]);
    }

    public function contactTypeList()
    {
        $types = $this->contact->getTypes();

        $contactTypes = [];
        foreach ($types as $value => $type) {
            $contactTypes[$value] = [
                'DisplayText' => ucwords($type),
                'Value'       => $value
            ];
        }

        return response()->json([
            'Result'  => 'OK',
            'Options' => $contactTypes
        ]);
    }
}
