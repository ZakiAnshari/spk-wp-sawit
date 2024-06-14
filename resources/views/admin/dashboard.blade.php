@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white" style="background-color: #6777ef;">
                    <div class="hero-inner">
                        <h2>Welcome, {{ Auth::user()->username }}</h2>
                        <h3 class="lead">Selamat datang di Program SPK Weight Product Penentuan Bibit Sawit berkualitas</h3>
                    </div>
                </div>
                
              </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total User </h4>
                </div>
                <div class="card-body">
                    10
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Karyawan</h4>
                </div>
                <div class="card-body">
                    42
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Reports</h4>
                </div>
                <div class="card-body">
                    1,201
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Online Users</h4>
                </div>
                <div class="card-body">
                    47
                </div>
                </div>
            </div>
            </div>                  
        </div>
        
        </section>
    </div>

@include('sweetalert::alert')

@endsection