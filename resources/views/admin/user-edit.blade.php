@extends('layouts.admin')

@section('title','User-Edit')

@section('content')
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/karyawan" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit User</h1>
        </div>
        
        <div class="card my-4">
            
            <div class="card-body ">
                
                <form action="/user-edit/{{$users->slug}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="form-group ">
                                <label>Nama</label>
                                <input  name="username" id="username" type="text" class="form-control"  value="{{ $users->username }}"  required >
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
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input  name="email" id="email" type="text" class="form-control"  value="{{ $users->email }}"  required >
                            </div>
                        </div>
                    </div>
                    
                    <div div class="col-sm-12 col-md-7">
                        <button href="#" class="btn btn-icon icon-left btn-primary" type="submit">
                        <i class="far fa-edit"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection