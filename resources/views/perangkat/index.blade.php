@extends('layout.master')
@section('title', 'Perangkat Nagari - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Perangkat Nagari</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Perangkat Nagari</li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Perangkat Nagari</h6>
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
              <th width="">Nama</th>
              <th width="">Jabatan</th>
              <th width="">Status</th>
              <th width="20%">Act</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($data as $key => $d)
          	<tr>
              <td>{{$key+1}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->jabatan}}</td>
              <td>{{$d->status}}</td>
              <td>
              	<div class="btn-group">
          				<a data-toggle="modal" data-target="#detail{{$d->id}}"><button class="btn btn-outline-success btn-sm mr-2"><i class="fa-solid fa-eye"></i></button></a>

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
                  <h5 class="modal-title" id="exampleModalLabel">Form Data Perangkat Nagari</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/perangkat/{{$d->id}}" method="post" enctype="multipart/form-data">
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
                      <label class="col-form-label">Jabatan<sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" required name="jabatan" placeholder="ex: Kepala Bidang Keuangan" value="{{$d->jabatan}}">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Mulat Tugas<sup class="text-danger">*</sup></label>
                      <input type="date" class="form-control" required name="mulai_tugas" value="{{$d->mulai_tugas}}">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Status<sup class="text-danger">*</sup></label>
                      <select required class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option value="Aktif" {{$d->status == "Aktif"?'selected':''}}>Aktif</option>
                        <option value="Tidak Aktif" {{$d->status == "Tidak Aktif"?'selected':''}}>Tidak Aktif</option>
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

            <!-- MODAL DETAIL -->
            <div class="modal fade" id="detail{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="card-content">
                    <div class="modal-header">
                      <label>Detail Perangkat Nagari</label>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
                    </div>
                    <div class="card-body">
                      <div class="text-center mb-4"><img src="{{ asset('foto_penduduk/'.$d->foto) }}" alt="Photo" width="50%" height="auto"></div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Nama</b></h5>
                              <p class="fst-italic">{{$d->nama}}</p>
                            </div>
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Jabatan</b></h5>
                              <p class="fst-italic">{{$d->jabatan}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Mula Bertugas</b></h5>
                              <p class="fst-italic">{{$d->mulai_tugas}}</p>
                            </div>
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Status</b></h5>
                              <p class="fst-italic">{{$d->status}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>Nik</b></h5>
                              <p class="fst-italic">{{$d->nik}}</p>
                            </div>
                            <div class="col-6">
                              <h5 class="card-title text-primary small"><b>No HP</b></h5>
                              <p class="fst-italic">{{$d->nohp}} <a style="color: green" target="_blank" href="https://api.whatsapp.com/send?phone={{ $d->nohp}}" ><i class="fa-brands fa-whatsapp"></i></a></p>
                            </div>
                          </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Data Perangkat Nagari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/perangkat" method="post" enctype="multipart/form-data">
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
            <label class="col-form-label">Jabatan<sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" required name="jabatan" placeholder="ex: Kepala Bidang Keuangan">
          </div>
          <div class="form-group">
            <label class="col-form-label">Mulat Tugas<sup class="text-danger">*</sup></label>
            <input type="date" class="form-control" required name="mulai_tugas">
          </div>
          <div class="form-group">
            <label class="col-form-label">Status<sup class="text-danger">*</sup></label>
            <select required class="form-control" name="status">
              <option value="">Select Status</option>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
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
		swal({
		  title: "Yakin hapus data?",
		  text: "Anda akan menghapus data "+ntah+" di perangkat nagari!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	window.location = "/perangkat-delete/"+idhapus+"",
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