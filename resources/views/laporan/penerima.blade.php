@extends('layout.master')
@section('title', 'Laporan Penerima Bantuan - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Perangkat Nagari</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Penerima Bantuan</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Penerima Bantuan</h6>
  </a>

  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <!-- DataTales Example -->
    <div class="card-body">
    	<a href="{{url('laporan-penerima-cetak', $id_bantuan)}}" class="btn btn-primary mb-4"><i class="fa-solid fa-print mr-2"></i>Cetak Laporan</a>

      <form class="form-group" action="{{url('laporan-penerima-search')}}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-6">
          	@php
          	$bantuan = \DB::table('bantuan')->get();
          	@endphp
            <select class="form-control" name="id_bantuan">
              <option value="">Select Bantuan</option>
              @foreach($bantuan as $key => $b)
                <option value="{{$b->id}}">{{$b->nama_bantuan}}</option>
              @endforeach
            </select>
          </div> 
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Next</button>
        	</div>
        </div>
      </form> 
      <div class="table-responsive" id="cetak">
        <table class="table table-bordered dt" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
            	<th width="5%">#</th>
              <th width="">Nama</th>
              <th width="">Bantuan</th>
              <th width="50%">Keterangan</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->nama_bantuan}}</td>
              <td>{{$d->keterangan}}</td>
            </tr>
          	@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection