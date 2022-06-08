@extends('layout.master')
@section('title', 'Penerima Bantuan - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Penerima Bantuan</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Penerima Bantuan</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Penerima Bantuan</h6>
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
              <th width="">Nama Penerima</th>
              <th width="">Nama Bantuan</th>
              @if (session()->get('role')!='Penduduk')
              <th width="20%">Act</th>
              @endif
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->nama_bantuan}}</td>
              @if (session()->get('role')!='Penduduk')
              <td>
              	<div class="btn-group">
          				<a data-toggle="modal" data-target="#detail{{$d->id}}"><button class="btn btn-outline-success btn-sm mr-2"><i class="fa-solid fa-eye"></i></button></a>

                  <a data-toggle="modal" data-target="#edit{{$d->id}}"><button class="btn btn-outline-warning btn-sm mr-2"><i class="fa-solid fa-pencil"></i></button></a>

                  <a href="#" class="btn btn-outline-danger btn-sm mr-2 swal-delete" data-id="{{$d->id}}" data-ntah="{{$d->nama}}" data-ntah2="{{$d->nama_bantuan}}"><i class="fa-solid fa-trash-can"></i></a>
                </div>
              </td>
              @endif
            </tr>
            <!-- MODAL EDIT -->
            <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Penerima Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/penerima/{{$d->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label class="col-form-label">Nama<sup class="text-danger">*</sup></label>
                        <select required name="id_penduduk" class="form-control">
                          <option value="">Pilih Penduduk</option>
                          @foreach($penduduk as $key=>$p)
                          <option value="{{$p->id}}" {{$d->id_penduduk == $p->id?'selected':''}}>{{$p->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Bantuan<sup class="text-danger">*</sup></label>
                        <select required name="id_bantuan" class="form-control">
                          <option value="">Pilih Bantuan</option>
                          @foreach($bantuan as $key=>$b)
                          <option value="{{$b->id}}" {{$d->id_bantuan == $b->id?'selected':''}}>{{$b->nama_bantuan}}</option>
                          @endforeach
                        </select>
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

            <!-- MODAL DETAIL -->
            <div class="modal fade" id="detail{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="card-content">
                    <div class="modal-header">
                      <label>Detail Penerima Bantuan</label>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
                    </div>
                    <div class="card-body">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Nama Bantuan</b></h5>
                              <p class="fst-italic">{{$d->nama_bantuan}}</p>
                            </div>
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Penerima</b></h5>
                              <p class="fst-italic">{{$d->nama}}</p>
                            </div>
                          </div>
                          <h5 class="card-title text-primary small"><b>Keterangan</b></h5>
                          <p class="fst-italic text-justify">{{$d->keterangan}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
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
        <h5 class="modal-title" id="exampleModalLabel">Form Data Penerima Bantuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/penerima" method="post" enctype="multipart/form-data">
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
    			<div class="form-group">
            <label class="col-form-label">Bantuan<sup class="text-danger">*</sup></label>
            <select required name="id_bantuan" class="form-control">
              <option value="">Pilih Bantuan</option>
              @foreach($bantuan as $key=>$b)
              <option value="{{$b->id}}">{{$b->nama_bantuan}}</option>
              @endforeach
            </select>
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
    var ntah2 = $(this).attr('data-ntah2');
		swal({
		  title: "Yakin hapus data?",
		  text: "Anda akan menghapus data "+ntah+" sebagai penerima bantuan "+ntah2+"!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	window.location = "/penerima-delete/"+idhapus+"",
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