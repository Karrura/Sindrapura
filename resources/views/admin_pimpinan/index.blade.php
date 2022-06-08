@extends('layout.master')
@section('title', 'Admin Pimpinan - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Admin Pimpinan</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Admin Pimpinan</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Admin Pimpinan</h6>
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
              <th>Nama</th>
              <th width="20%">Role</th>
              <th width="20%">Act</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->role}}</td>
              <td>
              	<div class="btn-group">
                  <a data-toggle="modal" data-target="#edit{{$d->id}}"><button class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pencil"></i></button></a>

                  <a href="#" class="btn btn-outline-danger btn-sm mr-2 swal-delete" data-id="{{$d->id}}" data-ntah="{{$d->nama}}"><i class="fa-solid fa-trash-can"></i></a>
                </div>
              </td>
            </tr>
            <!-- MODAL EDIT -->
            <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Admin dan Pimpinan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/admin/{{$d->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label class="col-form-label">Nama<sup class="text-danger">*</sup></label>
                        <select required name="id_penduduk" class="form-control">
                          <option value="">Pilih Penduduk</option>
                          @foreach($penduduk as $key=>$p)
                          <option value="{{$p->id}}" {{$p->id == $d->id_penduduk? 'selected':''}}>{{$p->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                      {{--<div class="form-group">
                        <label class="col-form-label">Password<sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control" name="password">
                        <sup class="text-danger">Kosongkan jika tidak diubah!</sup>
                      </div>--}}
                      <div class="form-group">
                        <label class="col-form-label">Role<sup class="text-danger">*</sup></label>
                        <select required name="role" class="form-control">
                          <option value="">Pilih Role</option>
                          <option value="Admin" {{$d->role == "Admin"? 'selected':''}}>Admin</option>
                          <option value="Pimpinan" {{$d->role == "Pimpinan"? 'selected':''}}>Pimpinan</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Data Admin dan Pimpinan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin" method="post" enctype="multipart/form-data">
        	@csrf
          <div class="form-group">
            <label class="col-form-label">Nama<sup class="text-danger">*</sup></label>
            <select required name="id_penduduk" class="form-control">
              <option value="">Pilih Penduduk</option>
              @foreach($penduduk as $key=>$p)
              <option value="{{$p->id}}">{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          {{--<div class="form-group">
            <label class="col-form-label">Password<sup class="text-danger">*</sup></label>
            <input type="password" class="form-control" name="password" required>
          </div>--}}
          <div class="form-group">
            <label class="col-form-label">Role<sup class="text-danger">*</sup></label>
            <select required name="role" class="form-control">
              <option value="">Pilih Role</option>
              <option value="Admin">Admin</option>
              <option value="Pimpinan">Pimpinan</option>
            </select>
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
		  text: "Anda akan menghapus data admin "+ntah+"!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	window.location = "/admin-delete/"+idhapus+"",
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