@extends('home')
@section('content')
    
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
						<div class="card-title">Data Materi</div>
                        <a href="{{ route('materi.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah Materi</a>
					</div>
				</div>
				<div class="card-body">
                    @if(Session::has('success'))

                        <div class="alert alert-primary">
                            {{ Session('success')}}
                        </div>

                    @endif
					<div class="table-responsive">
					<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($materi as $mat)
                            <tr>
                                <td>{{ $mat->id }}</td>
                                <td>{{ $mat->judul_materi }}</td>
                                <td>{{ $mat->kategori->nama }}</td>
                                <td>{{ $mat->users->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'. $mat->gambar_materi) }}" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('materi.edit', $mat->id)}}"
                                        class="btn btn-warning btn-sm">Edit Data</a>

                                    <form action="{{ route('materi.destroy', $mat->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="btn btn-danger btn-sm">

                                        <i class="fa fa-times"></i>

                                    </button>

                                    </form>
                                </td>
                            </tr>
                            
                            @empty
                                
                            <tr>
                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                            </tr>
                            
                            @endforelse
                            
                        </tbody>
                    </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection 