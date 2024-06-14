<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('admin.karyawan',['karyawans' => $karyawans]);
    }

    public function add()
    {
        return view('admin.karyawan-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_karyawan' => 'unique:karyawans',
        ]);
        $karyawans = Karyawan::create($request->all());
        return redirect('/karyawan')->with('toast_success','Data Karyawan berhasil di ditambahkan');
    }

    public function edit($slug)
    {
        $karyawans = Karyawan::where('slug',$slug)->first();
        return view('admin.karyawan-edit',['karyawans'=>$karyawans]);
    }

    public function update(Request $request,$slug)
    {       
        $karyawans = Karyawan::where('slug',$slug)->first();
        $karyawans->slug = null;
        $karyawans->update($request->all());
        return redirect('/karyawan')->with('toast_success','Data Karyawan berhasil di Edit');
    }

    public function destroy($id)
    { 
        $karyawans = Karyawan::where('id',$id)->first();
        $karyawans->delete();
        return redirect('/karyawan')->with('toast_success','Data Karyawan berhasil di Hapus');
    }

}
