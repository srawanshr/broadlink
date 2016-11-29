<?php

namespace App\Http\Controllers\Backend;

use DB;
use App\Http\Requests;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;

class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('backend.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $request)
    {
        DB::transaction(function () use ($request)
        {
            $client = Client::create($request->clientFillData());

            $image = $request->file('image');

            $client->image()->create(['name' => cleanFileName($image)])->upload($image);
        });

        return redirect()->back()->withSuccess(trans('messages.create_success', ['entity' => 'Client']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('backend.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientUpdateRequest $request
     * @param  client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        DB::transaction(function () use ($request, $client)
        {
            $client->update($request->clientFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                $client->image->upload($image);
            }
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Client']));
    }

    /**
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Client $client)
    {
        if ($client->delete())
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
            $service = Client::findOrFail($id);
            $service->order = $order;
            $service->save();
        }

        return response()->json([
            'Result'  => 'OK',
            'Message' => trans('messages.update_success', ['entity' => 'Order'])
        ]);
    }
}
