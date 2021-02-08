<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request,[
            'name'      => ['string', 'required'],
            'username'  => 'required|min:3|max:25|unique:users',
            'email'     => ['required', 'unique:users' ,'email'],
            'password'  => ['required', 'min:6']
        ]);

        User::create([
            'name'      => request('name'),
            'username'  => request('username'),
            'email'     => request('email'),
            'password'  => Hash::make($request->password)
        ]);


        return response('Terima kasih akun anda terdaftar');
    }
}
