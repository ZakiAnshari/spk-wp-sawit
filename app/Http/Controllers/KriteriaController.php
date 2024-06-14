<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.kriteria',['kriterias' => $kriterias]);
    }

    public function add()
    {
        return view('admin.kriteria-add');
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'kriteria' => 'unique:kriteria',
        // ]);
        $kriterias = Kriteria::create($request->all());
        return redirect('/kriteria')->with('toast_success','Data Kriteria berhasil di ditambahkan');
    }

    public function edit($slug)
    {
        $kriterias = Kriteria::where('slug',$slug)->first();
        return view('admin.kriteria-edit',['kriterias'=>$kriterias]);
    }

    public function update(Request $request,$slug)
    {       
        $kriterias = Kriteria::where('slug',$slug)->first();
        $kriterias->slug = null;
        $kriterias->update($request->all());
        return redirect('/kriteria')->with('toast_success','Data kriteria berhasil di Edit');
    }

    
    public function destroy($id)
    { 
        $kriterias = Kriteria::where('id',$id)->first();
        $kriterias->delete();
        return redirect('/kriteria')->with('toast_success','Data Kriteria berhasil di Hapus');
    }

}
