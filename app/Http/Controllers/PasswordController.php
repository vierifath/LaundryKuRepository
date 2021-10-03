<?php

namespace App\Http\Controllers;

class PasswordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('password.edit');
    }

    public function update(UpdatePasswordRequest $request){

    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect()->route('user.password.edit');
}

    

}

