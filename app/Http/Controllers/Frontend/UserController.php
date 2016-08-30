<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Invoice;
use App\Models\User;
use DB;

class UserController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = auth()->guard('user')->user();

        return view('frontend.user.index', compact('user'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->guard('user')->user();

        return view('frontend.user.edit', compact('user'));
    }

    /**
     * @param UserUpdateRequest $request
     * @return mixed
     */
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

    /**
     * @param Invoice $invoice
     * @return \Illuminate\View\View
     */
    public function invoice(Invoice $invoice)
    {
        return view('shared.invoice', compact('invoice'));
    }

    /**
     * @param ChangePasswordRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        $password = bcrypt($request->get('password'));

        $user->update(['password' => $password]);

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Password']));
    }
}
