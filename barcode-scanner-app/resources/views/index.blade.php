@extends('layouts.main')

@section('container')
<main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">{{ $title }}</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
      <div class="row">
      <div class="col-xl-6 col-md-6">
        <div class="card bg-primary text-white mb-4">
          <div class="card-body">
            <i class="col-1 fa-solid fa-box"></i>
            <div class="col-7">Kategori Barang</div>
            {{-- <h2 class="col-4">6</h2> --}}
            <h2 class="col-4">{{ $total_kategori ?? 'Data tidak tersedia' }}</h2>
          </div>
          <div
            class="card-footer d-flex align-items-center justify-content-between"
          >
            <a class="small text-white stretched-link" href="#"
              >View Details</a
            >
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6">
        <div class="card bg-success text-white mb-4">
          <div class="card-body">
            <i class="fa-solid fa-arrow-up-from-bracket"></i>
            <div class="col-7">Total Barang</div>
            {{-- <h2 class="col-4">20</h2> --}}
            <h2 class="col-4">{{ $total_barang ?? 'Data tidak tersedia' }}</h2>
          </div>
          <div
            class="card-footer d-flex align-items-center justify-content-between"
          >
            <a class="small text-white stretched-link" href="#"
              >View Details</a
            >
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
