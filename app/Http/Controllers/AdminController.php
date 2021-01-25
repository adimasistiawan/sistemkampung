<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::guard('admin')->user()->role == 'admin' ){
            return redirect()->back();
        }
        $data = User::where('role','!=','superadmin')->orderBy('created_at','desc')->get();
        return view('admin.akunadmin.index',compact('data'));
    }

    public function ubahakun()
    {
        return view('admin.akunadmin.ubahakun');
    }

    public function ubahakun_update(Request $request)
    {
        $admin = User::find(Auth::guard('admin')->user()->id);
        $check = User::where('email', $request->email)->where('email','!=',$admin->email)->get();
        $check2 = User::where('nama', $request->nama)->where('nama','!=',$admin->nama)->get();
        if(count($check) > 0){
            return redirect()->back()->with('error', 'Gagal. Email sudah pernah terdaftar ');;
        }
        if(count($check2) > 0){
            return redirect()->back()->with('error', 'Gagal. Nama sudah pernah terdaftar ');;
        }
        if($request->password == null){
            User::find(Auth::guard('admin')->user()->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
        }else{
            User::find(Auth::guard('admin')->user()->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        

        return redirect()->route('ubahakun.index')->with('success', 'Success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = User::where('email', $request->email)->get();
        $check2 = User::where('nama', $request->nama)->get();
        if(count($check) > 0){
            return redirect()->back()->with('error', 'Gagal. Email sudah pernah terdaftar ');;
        }
        if(count($check2) > 0){
            return redirect()->back()->with('error', 'Gagal. Nama sudah pernah terdaftar ');;
        }
        
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);
        

        return redirect()->back()->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        $check = User::where('email', $request->email)->where('email','!=',$admin->email)->get();
        $check2 = User::where('nama', $request->nama)->where('nama','!=',$admin->nama)->get();
        if(count($check) > 0){
            return redirect()->back()->with('error', 'Gagal. Email sudah pernah terdaftar ');;
        }
        if(count($check2) > 0){
            return redirect()->back()->with('error', 'Gagal. Nama sudah pernah terdaftar ');;
        }
        if($request->password == null){
            User::find($id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
        }else{
            User::find($id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        

        return redirect()->back()->with('success', 'Success');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Success');
    }
}
