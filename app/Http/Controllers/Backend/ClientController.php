<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Client;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$clients = Client::published()->get();
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $inputs = $request->except('image');
            $inputs['slug'] = str_slug($inputs['name']);

            $image = $request->file('image');

            $client = Client::create($inputs);

            $client->image()->create([])->setPath($image);
        });

        return redirect()->back()->with('success', 'Client added!');
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
     * @param  \Illuminate\Http\Request $request
     * @param  client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        DB::transaction(function () use ($request, $client) {
            $inputs = $request->except('image');

            $image = $request->file('image');

            $client->update($inputs);

            $client->image->setPath($image);
        });

        return redirect()->back()->with('success', 'Client updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->back()->with('success', 'Client deleted!');
    }
}
