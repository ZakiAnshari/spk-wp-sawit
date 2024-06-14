@extends('layouts.admin')

@section('title','Alternatif ')

@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Alternatif </h1>
        </div>
      <div class="card">
        <div class="row">
            <div class="card-header">
                <h4>Table Alternatif </h4>
                </div>
                <div class="col-lg-8">
                    <div class="mx-4">
                        <a href="/alternatif-add">
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
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $k)
                                <th>{{ $k->kriteria }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatifs as $item)
                            <tr  style="text-align: center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->alteratif }}</td>
                                @foreach ($kriterias as $index => $k)
                                    <td>{{ $item['k' . ($index + 1)] }}</td>
                                @endforeach
                                <td class="text-center">
                                    <a href="/alternatif-edit/{{$item->slug}}" class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="/alternatif-destroy/{{$item->id}}" class="btn btn-danger btn-action trigger--fire-modal-1 show_confirm" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($kriterias) + 3 }}" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
              </div>
          </div>
  
      </div>
    
      {{-- EDIT --}}
      
  </div>
  </div>
@include('sweetalert::alert')

@endsection