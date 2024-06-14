@extends('layouts.admin')

@section('title','Users-add')

@section('content')
<style>
    .form-group label{
        font-size: medium;
    }
</style>
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/user" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah User</h1>
        </div>
       
        <div class="card my-4">
            
            <div class="card-body ">
                
                <form action="/user-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Masukkan Nama</label>
                                        <input name="username" id="username" type="text" class="form-control" placeholder="Masukkan Nama" required >
                                    </div>
                                    <div class="form-group">
                                        <label>Masukkan Email</label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email" required >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control py-0" required="required" name="role_id" style="width: 100%">
                                            <option value="">Pilih</option>
                                            @foreach($roles as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                    <div class="form-group">
                                        <label>Masukkan Password</label>
                                        <input name="password" id="password" type="text" class="form-control" placeholder="Masukkan Password" value="{{ old('password') }}" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div div class="col-sm-12 col-md-7">
                            <button  class="btn btn-icon icon-left btn-primary"  type="submit"><i class="fas fa-check"></i> Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection