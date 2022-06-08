@extends('layout.master')
@section('title', 'Bantuan - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Bantuan</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item">Bantuan</li>
    <li class="breadcrumb-item active" aria-current="page">Data Bantuan</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Bantuan</h6>
  </a>
  @if(Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show m-2" role="alert">
      {{Session::get('success')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
  @elseif(Session::has('error'))
  	<div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
      {{Session::get('error')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
  @endif
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <!-- DataTales Example -->
    <div class="card-body">
    	<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus mr-2"></i>Data</button>
      <div class="table-responsive">
        <table class="table table-bordered dt" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
            	<th width="5%">#</th>
              <th>Bantuan</th>
              <th width="20%">Kuota Penerima</th>
              @if (session()->get('role')!='Penduduk')
              <th width="20%">Act</th>
              @endif
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama_bantuan}}</td>
              <td>{{$d->kuota_penerima}}</td>
              @if (session()->get('role')!='Penduduk')
              <td>
              	<div class="btn-group">
          				<a data-toggle="modal" data-target="#detail{{$d->id}}"><button class="btn btn-outline-success btn-sm mr-2"><i class="fa-solid fa-eye"></i></button></a>

                  <a data-toggle="modal" data-target="#edit{{$d->id}}"><button class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pencil"></i></button></a>

                  <a href="#" class="btn btn-outline-danger btn-sm mr-2 swal-delete" data-id="{{$d->id}}" data-ntah="{{$d->nama_bantuan}}"><i class="fa-solid fa-trash-can"></i></a>
                </div>
              </td>
              @endif
            </tr>
            <!-- MODAL EDIT -->
            <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Form Data Bantuan</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="/bantuan/{{$d->id}}" method="post" enctype="multipart/form-data">
						        	@csrf
						        	@method('PUT')
						          <div class="form-group">
						            <label class="col-form-label">Nama Bantuan<sup class="text-danger">*</sup></label>
						            <input type="text" class="form-control" name="nama_bantuan" required placeholder="ex: Bantuan Sosial" value="{{$d->nama_bantuan}}">
						          </div>
						          <div class="form-group">
						            <label class="col-form-label">Kuota Penerima<sup class="text-danger">*</sup></label>
						            <input type="number" class="form-control" name="kuota_penerima" required="" placeholder="ex: 25" value="{{$d->kuota_penerima}}">
						          </div>
						          <div class="form-group">
						            <label for="message-text" class="col-form-label">Keterangan</label>
						            <textarea class="form-control" name="keterangan">{{$d->keterangan}}</textarea>
						          </div>
						          <div class="modal-footer">
								        <button type="submit" class="btn btn-primary">Save</button>
								      </div>
						        </form>
						      </div>
						    </div>
						  </div>
						</div>

            <!-- Modal Detail -->
            <div class="modal fade" id="detail{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="card-content">
                    <div class="modal-header">
                      <label>Detail Bantuan</label>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                        	<h5 class="card-title text-primary small"><b>Nama Bantuan</b></h5>
						      				<p class="fst-italic">{{$d->nama_bantuan}}</p>
                          <h5 class="card-title text-primary small"><b>Kuota Penerima</b></h5>
						      				<p class="fst-italic">{{$d->kuota_penerima}}</p>
                          <h5 class="card-title text-primary small"><b>Keterangan</b></h5>
						      				<p class="fst-italic">{{$d->keterangan}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
            <!-- /Modal Detail -->
          	@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- MODAL TAMBAH -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Data Bantuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/bantuan" method="post" enctype="multipart/form-data">
        	@csrf
          <div class="form-group">
            <label class="col-form-label">Nama Bantuan<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control @error('bantuan') is-invalid @enderror" name="nama_bantuan" placeholder="ex: Bantuan Sosial" required>
            @error('bantuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="col-form-label">Kuota Penerima<sup class="text-danger">*</sup></label>
            <input type="number" class="form-control" name="kuota_penerima" required="" placeholder="ex: 25">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan"></textarea>
          </div>
          <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
	$('.swal-delete').click(function() {
		var idhapus = $(this).attr('data-id');
		var ntah = $(this).attr('data-ntah');
    console.log(idhapus, ntah);
		swal({
		  title: "Yakin hapus data?",
		  text: "Anda akan menghapus data "+ntah+"!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	window.location = "/bantuan-delete/"+idhapus+"",
		    swal("Data berhasil dihapus!", {
		      icon: "success",
		    });
		  } else {
		    swal("Data batal dihapus!");
		  }
		});
	});
</script>
@endsection