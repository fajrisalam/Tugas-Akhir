<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_rs() {
    	return view('base.login_rs');
    }

    public function doLoginRs(Request $request) {
    	$rules = array(
    		'username' => required,
    		'password' => required
    		);

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		echo 'Login Gagal';
    		return view('base.login_rs')->withErrors($validator)->withInput(Input::except('password'));
    	} else {
    		$userdata = array(
    			'username' => $request->username,
    			'password' => $request->password
    			);
    		if (Auth::attempt(array('username' => $userdata['username'], 'password' => $userdata['password']), true) {
	    		Session::flash('sukses', 'Login berhasil');
	    		return redirect()->route('daftarkelahiranrs.addIndex');
	    	} else {
	    		Session::flash('gagal', 'Login Gagal! Periksa kembali username dan password Anda.');
	    		return redirect()->route($request->url())
	    			->withErrors(['Email/Username atau Password salah'])
	    			->withInput(Input::except('password'));;
	    	}
    	}
    }
}
