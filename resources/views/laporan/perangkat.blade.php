@extends('layout.master')
@section('title', 'Laporan Perangkat - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Perangkat Nagari</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Perangkat Nagari</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Perangkat Nagari</h6>
  </a>

  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <!-- DataTales Example -->
    <div class="card-body">
    	<a href="{{url('laporan-perangkat-cetak')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-print mr-2"></i>Cetak Laporan</a>

      <div class="table-responsive" id="cetak">
        <table class="table table-bordered dt" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th width="5%">#</th>
              <th width="">Nama</th>
              <th width="">Jabatan</th>
              <th width="">Mulai Tugas</th>
              <th width="20%">Status</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->jabatan}}</td>
              <td>{{$d->mulai_tugas}}</td>
              <td>{{$d->status}}</td>
            </tr>
          	@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection