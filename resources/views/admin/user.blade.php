@extends('layouts.admin')

@section('title','User')

@section('content')
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data User</h1>
        </div>
        <div class="card">
          <div class="row">
            <div class="card-header">
                <h4>Table User</h4>
                </div>
                <div class="col-lg-8">
                    <div class="mx-4">
                        <a href="/user-add">
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
                    <tr >
                      <th style="width:10%;">No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th></th>
                      <th style="width: 17%">Aksi</th>
                    </tr>
                  </thead>
                    <tbody>
                        @forelse  ($users as $item)
                        <tr   >
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email}}</td>
                         
                            <td> 
                              <a href="#" class="font-weight-600">
                                <img src="{{ asset('back_end/dist/assets/img/avatar/avatar-1.png') }}" alt="avatar" width="30" class="rounded-circle mr-1">
                                </a>{{ $item->role->name}}
                            </td>
                            <td></td>
                            <td class="text-center">
                                <a href="/user-edit/{{$item->slug}}" class="btn btn-primary btn-action" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="/user-destroy/{{$item->id}}" class="btn btn-danger btn-action trigger--fire-modal-1 show_confirm" data-toggle="tooltip" data-original-title="Delete">
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
                <div class="my-3" >
                  {{ $users->links() }}
                </div>
              </div>
          </div>
  
        </div>
        
      </div>
     
  
      {{-- EDIT --}}
      
  </div>
  </div>
@include('sweetalert::alert')




@endsection