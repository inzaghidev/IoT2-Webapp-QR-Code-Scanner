@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Data Barang</h5>
                    <h3>4</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Barang Masuk</h5>
                    <h3>2</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Barang Keluar</h5>
                    <h3>1</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
