@extends('layout.master')
@section('title', 'Profile Nagari - SINDRAPURA')
@section('isi')
<!-- <h1 class="h3 text-gray-800">Data Admin Pimpinan</h1> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('nagari')}}">Profile Nagari</a></li>
  </ol>
</nav>

<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
      role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="h5 m-0 font-weight-bold text-dark">Data Nagari <span class="text-primary">{{$data->nagari}}</span></h6>
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
    	<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="update-tab" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false">Update</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	<div class="text-center mt-4">
			  		<img src="{{asset('nagari/'.$data->logo)}}" alt="Logo" class="col-lg-3 col-md-4">
			  	</div>
			  	<h4 class="text-dark text-center font-weight-bold mt-4">Nagari {{$data->nagari}}</h4>
			  	<div class="card-body">
			  	<h5 class="card-title text-primary text-center"><b>Visi</b></h5>
			  	<p class="fst-italic" align="justify">{{$data->visi}}</p>
			  	<h5 class="card-title text-primary text-center mt-4"><b>Misi</b></h5>
			  	<p class="fst-italic" align="justify">{{$data->misi}}</p>
			  	<h5 class="card-title text-primary text-center mt-4"><b>Narahubung</b></h5>
			  	<p class="fst-italic text-dark font-weight-bold mb-0" align="center">{{$data->telp}}</p>
			  	<p class="fst-italic text-dark font-weight-bold" align="center">{{$data->email}}</p>
			  	<h5 class="card-title text-primary text-center mt-4"><b>Keterangan</b></h5>
			  	<p class="fst-italic" align="justify">{{$data->keterangan}}</p>
			  	<div class="text-center mt-4">
		  			<img src="{{asset('nagari/'.$data->foto)}}" height="40%" width="auto">
		  		</div>

		  		<div class="mt-4">
		  			<hr><hr>
		  		</div>
			  	

			  	<div class="row mt-4">
		  			<div class="col-5"><h6 class="card-title text-primary"><b>Kepala Nagari</b></h6></div>
		  			<div class="col-5"><p class="fst-italic">{{$data->nama}}</p></div>
		  		</div>
		  		<div class="row">
		  			<div class="col-5"><!-- <h6 class="card-title text-primary"><b>Foto Kepala Nagari</b></h6> --></div>
		  			<div class="col-5"><img src="{{asset('foto_penduduk/'.$data->foto_pimpinan)}}" alt="Logo" class="" width="50%" height="auto"></div>
		  		</div>
		  		<div class="row mt-4">
		  			<div class="col-5"><h6 class="card-title text-primary"><b>Tanggal Lahir</b></h6></div>
		  			<div class="col-5"><p class="fst-italic">{{$data->tgl_lahir}}</p></div>
		  		</div>
		  		<div class="row">
		  			<div class="col-5"><h6 class="card-title text-primary"><b>Pendidikan</b></h6></div>
		  			<div class="col-5"><p class="fst-italic">{{$data->pendidikan}}</p></div>
		  		</div>
		  		<div class="row">
		  			<div class="col-5"><h6 class="card-title text-primary"><b>Alamat</b></h6></div>
		  			<div class="col-5"><p class="fst-italic">{{$data->alamat}}</p></div>
		  		</div>
		  		<div class="row">
		  			<div class="col-5"><h6 class="card-title text-primary"><b>No Telpon</b></h6></div>
		  			<div class="col-5"><p class="fst-italic">{{$data->nohp}}</p></div>
		  		</div>
			  		
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
			  	<div class="">
			  		@if (session()->get('role')!='Penduduk')
			  		<div class="card-body">
		          <form action="/profile/{{$data->id}}" method="post" enctype="multipart/form-data">
	            @csrf
	            @method('PUT')
		          <div class="row">
		          	<div class="col-6">
		          		<div class="form-group">
			            	<label for="icon">Logo</label>
					          <div class="">
					            <img src="{{asset('nagari/'.$data->logo)}}" alt="Logo" class="col-lg-5 col-md-8">
					             <input class="form-control" type="file" name="logo">
					          </div>
					        </div>
		          	</div>
		          	<div class="col-6">
		          		<div class="form-group">
			            	<label for="icon">Foto</label>
					          <div class="">
					            <img src="{{asset('nagari/'.$data->foto)}}" alt="Foto" class="col-lg-5 col-md-8">
					             <input class="form-control" type="file" name="foto">
					          </div>
					        </div>
		          	</div>
		          </div>
		          <div class="row">
		          	<div class="col-6">
		          		<div class="form-group">
	                  <label class="col-form-label">Nama Nagari<sup class="text-danger">*</sup></label>
	                  <input type="text" class="form-control" name="nagari" placeholder="ex: Suliki" required value="{{$data->nagari}}">
	                </div>
		          	</div>
		          	<div class="col-6">
		          		<div class="form-group">
	                  <label class="col-form-label">Kepala Nagari<sup class="text-danger">*</sup></label>
	                  <select required name="id_pimpinan" class="form-control">
	                    <option value="">Pilih Penduduk</option>
	                    @foreach($pimpinan as $key=>$p)
	                    <option value="{{$p->id}}" {{$p->id == $data->id_pimpinan? 'selected':''}}>{{$p->nama}}</option>
	                    @endforeach
	                  </select>
	                </div>
		          	</div>
		          </div>
		          <div class="row">
		          	<div class="col-6">
		          		<div class="form-group">
				            <label for="message-text" class="col-form-label">Visi<sup class="text-danger">*</sup></label>
				            <textarea class="form-control" name="visi" rows="7" required>{{$data->visi}}</textarea>
				          </div>
		          	</div>
		          	<div class="col-6">
		          		<div class="form-group">
				            <label for="message-text" class="col-form-label">Misi<sup class="text-danger">*</sup></label>
				            <textarea class="form-control" name="misi" rows="7" required>{{$data->misi}}</textarea>
				          </div>
		          	</div>
		          </div>
		          <div class="row">
		          	<div class="col-6">
		          		<div class="form-group">
	                  <label class="col-form-label">Email<sup class="text-danger">*</sup></label>
	                  <input type="text" class="form-control" name="email" placeholder="ex: email12345@gmail.com" required value="{{$data->email}}">
	                </div>
		          	</div>
		          	<div class="col-6">
		          		<div class="form-group">
	                  <label class="col-form-label">Telepon<sup class="text-danger">*</sup></label>
	                  <input type="text" class="form-control" name="telp" placeholder="ex: 0752 7754151" required value="{{$data->telp}}">
	                </div>
		          	</div>
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">Keterangan</label>
		            <textarea class="form-control" rows="5" name="keterangan">{{$data->keterangan}}</textarea>
		          </div>
	            <div class="text-right">
	              <button type="submit" class="btn btn-primary btn-block">Save</button>
	            </div>
		          </form>
		        </div>
		        @endif
		        @if (session()->get('role')=='Penduduk')
		        <div class="card-body">
		        	<h1 class="h3 text-danger text-center">You have no access to update this content!</h1>
		        </div>
		        @endif
			  	</div>
				</div>
			</div>
	   </div>
  </div>
</div>
@endsection