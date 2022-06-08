@extends('layout.master')
@section('title', 'Laporan Penduduk - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Perangkat Nagari</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Laporan Penduduk</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Penduduk</h6>
  </a>

  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <!-- DataTales Example -->
    <div class="card-body">
    	<a href="{{url('laporan-penduduk-cetak')}}" class="btn btn-primary mb-4"><i class="fa-solid fa-print mr-2"></i>Cetak Laporan</a>

      <div class="table-responsive" id="cetak">
        <table class="table table-bordered dt" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th width="5%">No</th>
              <th width="25%">NIK</th>
              <th width="">Nama</th>
              <th>No HP</th>
              <th width="5%">P/L</th>
              <th>Tgl Lahir</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td align="center">{{$key+1}}</td>
              <td align="center">{{$d->nik}}</td>
              <td>{{$d->nama}}</td>
              <td align="center">{{$d->nohp}}</td>
              <td align="center">
                @if($d->jenkel == "Perempuan")
                  P
                @else
                  L
                @endif
              </td>
              <td align="center">{{$d->tgl_lahir}}</td>
            </tr>
          	@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection