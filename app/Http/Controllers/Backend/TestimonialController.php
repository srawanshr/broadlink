<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);

        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->lists('display_name', 'id');

        return view('backend.testimonial.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Testimonial::create($request->all());

        return redirect()->back()->withSuccess('Testimonial created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Testimonial $testimonial)
    {
        $users = User::all()->lists('display_name', 'id');

        return view('backend.testimonial.edit', compact('testimonial', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $inputs = $request->all();

        $inputs['is_published'] = $request->get('is_published', 0);

        $testimonial->update($inputs);

        return redirect()->back()->withSuccess('Testimonial updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->back()->withSuccess('Testimonial deleted!');
    }
}
