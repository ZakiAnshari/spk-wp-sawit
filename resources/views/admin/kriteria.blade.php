@extends('layouts.admin')

@section('title','Kriteria')

@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Kriteria</h1>
        </div>
      <div class="card">
        <div class="row">
            <div class="card-header">
                <h4>Table Kriteria</h4>
                </div>
                <div class="col-lg-8">
                    <div class="mx-4">
                        <a href="/kriteria-add">
                            <button class="btn btn-primary  ">
                                <i class="bi bi-person-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col my-3">
                        <form id="search-form mx-5">
                        <div class="input-group ">
                            <input type="text" name="keyword" class="form-control " placeholder="Cari">
                            <div class="input-group-append ">
                            <button class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
          <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Kriteria</th>
                            <th>Kepentingan</th>
                            <th>Goal Benefit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse  ($kriterias as $item)
                            <tr  >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kriteria }}</td>
                                <td>{{ $item->kepentingan}}</td>
                                <td>{{ $item->benefit}}</td>
                                
                                <td class="text-center">
                                    <a href="/kriteria-edit/{{$item->slug}}" class="btn btn-primary btn-action" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="/kriteria-destroy/{{$item->id}}" class="btn btn-danger btn-action trigger--fire-modal-1 show_confirm" data-toggle="tooltip" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center"> Data Kosong</td>
                            </tr>
                            @endforelse 
                    </tbody>
                </table>
                {{-- <div class="my-3" >
                    {{ $karyawans->links() }}
                </div> --}}
            </div>
          </div>
  
      </div>
     
  
      {{-- EDIT --}}
  </div>
  </div>
@include('sweetalert::alert')

@endsection