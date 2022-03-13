@extends('template-backend.default')

@section('content')

@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

@if(Session::has('success'))

        <div class="alert alert-primary">
            {{ Session('success')}}
        </div>

@endif

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="col-md-12">
		<div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Edit Kategori <i>{{ $kategori->nama }}</i></div>
                    <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
                </div>
            </div>

            <div class="card-body">

                <form action="{{ route ('kategori.update', $kategori->id)}}" method="post">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" name="nama" value="{{ $kategori->nama }}" class="form-control" id="text" placeholder="Enter Kategori">
                        <small>Isian Minimal 4 huruf</small>
                    </div>

                    <div class="form-group">
                    
                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    
                    </div>
    
                </form>
                
            </div>
        </div>
    </div>
</div>
    
@endsection