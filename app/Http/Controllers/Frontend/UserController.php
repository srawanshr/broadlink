<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller {

    public function dashboard()
    {
        $user = auth()->guard('user')->user();

        return view('frontend.user.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->guard('user')->user();

        return view('frontend.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = auth()->guard('user')->user();

        DB::transaction(function () use ($request, $user)
        {
            $user->update($request->userFillData());

            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                if ($user->image)
                {
                    $user->image->upload($image);
                } else
                {
                    $user->image()->create(['name' => cleanFileName($image)])->upload($image);
                }
            }
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Profile']));
    }
}
