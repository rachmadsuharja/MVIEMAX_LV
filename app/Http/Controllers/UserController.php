<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publisher;
use App\Models\Membership;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerMembership() {
        $roles = Role::all();
        return view('users/reg-member', [
            "title" => "Register Membership",
            "roles" => $roles
        ]);
    }
    public function storeRegMember(Request $request) {
        $request->validate([
            "name" => 'required|alpha',
            "email" => 'required|unique:user_membership|email',
            "password" => 'required|confirmed',
            "gender" => 'required',
            "role_id" => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.alpha' => 'Nama harus terdiri dari huruf',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Password tidak sama',
            'gender.required' => 'Pilih gender terlebih dahulu',
            'role_id.required' => 'Pilih role terlebih dahulu',
        ]);
        $name = Str::ucfirst($request->name);
        $data = User::create([
            "name" => $name,
            "username" => microtime(true),
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => "membership",
        ]);
        $member = Membership::create([
            "user_id" => $data->id,
            "name" => $data->name,
            "email" => $data->email,
            "password" => $data->password,
            "gender" => $request->gender,
            "role_id" => $request->role_id,
        ]);
        $data->save();
        $member->save();
        return redirect('/membership-login');
    }

    public function loginMembership() {
        return view('users/login-member', [
            "title" => "Login Membership"
        ]);
    }
    public function storeLoginMember(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'=> 'required|exists:user_membership|email',
            'password'=> 'required',
        ],[
            'email.required' => 'Isi email terlebih dahulu',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
            'password.required' => 'Isi password terlebih dahulu',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->messages());
        }
        $db_pass = DB::table('users')->where('email', $request->email)->value('password');
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Hash::check($request->password, $db_pass)) {
            if (Auth::attempt($login)) {
                return redirect('/membership');
            }
        } else {
            return redirect('/membership-login')->with('error', 'Password Salah!');
        }
        
    }
    public function memberLogout() {
        Auth::logout();
        return redirect('/membership-login');
    }
    public function forgotMember() {
        return view('/users/forgot/member-forgot-password', [
            "title" => "Forgot Password Membership"
        ]);
    }
    public function updateMemberPass(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" => 'required|exists:user_membership|email',
            "password" => 'required|confirmed',
        ], [
            'email.required' => 'Masukkan email terlebih dahulu',
            'email.exists' => 'Email tidak terdaftar',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Password tidak sama',
        ]);
        if ($validator->fails()) {
            return redirect('/membership-forgot-password')->withErrors($validator->errors()->messages());
        }
        $pass = Hash::make($request->password);
        DB::table('users')->where('email', $request->email)->update([
            "password" => $pass
        ]);
        DB::table('user_membership')->where('email', $request->email)->update([
            "password" => $pass
        ]);
        return redirect('/membership-login')->with('success', 'Berhasil mengubah password');
    }

    public function registerPublisher() {
        return view('users/reg-publish', [
            "title" => "Register Publisher"
        ]);
    }
    public function storeRegPublisher(Request $request) {
        $request->validate([
            'username' => 'required|unique:user_publisher|alpha|min:6',
            'no_telp' => 'required|numeric|unique:user_publisher',
            'password' => 'required|confirmed',
            'address' => 'required',
        ], [
            'username.required' => 'isi username terlebih dahulu',
            'username.unique' => 'username sudah terdaftar',
            'username.alpha' => 'username hanya boleh terdiri dari huruf',
            'username.min' => 'Isi username minimal 6 karakter',
            'no_telp.required' => 'nomor telpon tidak boleh kosong',
            'no_telp.numeric' => 'nomor telpon tidak valid',
            'no_telp.unique' => 'nomor telpon sudah terdaftar',
            'password.required' => 'password tidak boleh kosong',
            'password.confirmed' => 'password tidak sama',
            'address.required' => 'Alamat tidak boleh kosong',
        ]);
        $username = Str::lower($request->username);
        $data = User::create([
            "name" => time(),
            "email" => microtime(true),
            "username" => $username,
            "password" => Hash::make($request->password),
            "role" => "publisher",
        ]);
        $publisher = Publisher::create([
            "user_id" => $data->id,
            "username" => $data->username,
            "no_telp" => $request->no_telp,
            "password" => $data->password,
            "address" => $request->address,
        ]);
        $data->save();
        $publisher->save();
        return redirect('/publisher-login');
    }
    
    public function loginPublisher() {
        return view('users/login-publisher', [
            "title" => "Login Publisher"
        ]);
    }
    public function forgotPublisher() {
        return view('users/forgot/publisher-forgot-password', [
            "title" => "Forgot Password Publisher"
        ]);
    }
    public function updatePublishPass(Request $request) {
        $validator = Validator::make($request->all(), [
            "username" => 'required|exists:user_publisher',
            "password" => 'required|confirmed',
        ], [
            'username.required' => 'Masukkan username terlebih dahulu',
            'username.exists' => 'Username tidak terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Password tidak sama',
        ]);
        if ($validator->fails()) {
            return redirect('/publisher-forgot-password')->withErrors($validator->errors()->messages());
        }
        $pass = Hash::make($request->password);
        $data = DB::table('users')->where('username', $request->username);
        $data->update([
            "password" => $pass
        ]);
        DB::table('user_publisher')->where('username', $request->username)->update([
            "password" => $pass
        ]);
        return redirect('/publisher-login')->with('success', 'Berhasil mengubah password');
    }
    public function storeLoginPublisher(Request $request) {
        $validator = Validator::make($request->all(), [
            'username'=> 'required|exists:user_publisher',
            'password'=> 'required',
        ],[
            'username.required' => 'Isi username terlebih dahulu',
            'password.required' => 'Isi password terlebih dahulu',
            'username.exists' => 'Username tidak terdaftar',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->messages());
        }
        $db_pass = DB::table('users')->where('username', $request->username)->value('password');
        $login = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Hash::check($request->password, $db_pass)) {
            if (Auth::attempt($login)) {
                return redirect('/publisher');
            }
        } else {
            return redirect('/publisher-login')->with('error', 'Password Salah');
        }
    }
    public function publisherLogout() {
        Auth::logout();
        return redirect('/publisher-login');
    }

    public function loginAdministrator() {
        return view('users/login-admin', [
            "title" => "Login Admin"
        ]);
    }
    public function storeLoginAdmin(Request $request) {
        $validator = Validator::make($request->all(), [
            'username'=> 'required|exists:user_administrator',
            'password'=> 'required',
        ],[
            'username.required' => 'Isi username terlebih dahulu',
            'password.required' => 'Isi password terlebih dahulu',
            'username.exists' => 'Username tidak terdaftar',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->messages());
        }
        $login = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $db_pass = DB::table('users')->where('username', $request->username)->value('password');
        if (Hash::check($request->password, $db_pass)) {
            if (Auth::attempt($login)) {
                return redirect('/administrator')->with('success', 'Berhasil Login');
            }
        } else {
            return redirect('/admin-login')->with('error', 'Password Salah');
        }
        
    }
    public function adminLogout() {
        Auth::logout();
        return redirect('/admin-login');
    }
}
