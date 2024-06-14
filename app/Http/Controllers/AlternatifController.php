<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('admin.alternatif',['alternatifs' => $alternatifs,'kriterias' => $kriterias]);
    }

    public function add()
    {
        $kriterias = Kriteria::all();
        return view('admin.alternatif-add',['kriterias' => $kriterias]);
    }


    public function store(Request $request)
    {
        $alternatifs = Alternatif::create($request->all());
        return redirect('/alternatif')->with('toast_success','Data Alternatif berhasil di ditambahkan');
    }

    public function edit($slug)
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::where('slug',$slug)->first();
        return view('admin.alternatif-edit',['alternatifs'=>$alternatifs,'kriterias' => $kriterias]);
    }

    public function update(Request $request,$slug)
    {       
        $alternatifs = Alternatif::where('slug',$slug)->first();
        $alternatifs->slug = null;
        $alternatifs->update($request->all());
        return redirect('/alternatif')->with('toast_success','Data Alternatif berhasil di Edit');
    }


    public function destroy($id)
    { 
        $alternatifs = Alternatif::where('id',$id)->first();
        $alternatifs->delete();
        return redirect('/alternatif')->with('toast_success','Data Alternatif berhasil di Hapus');
    }
}
