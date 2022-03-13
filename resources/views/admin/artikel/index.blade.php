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
						<div class="card-title">Data Artikel</div>
                        <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah Artikel</a>
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
                                <th>Slide</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artikel as $art)
                            <tr>
                                <td>{{ $art->id }}</td>
                                <td>{{ $art->judul }}</td>
                                <td>{{ $art->kategori->nama }}</td>
                                <td>{{ $art->users->name }}</td>
                                <td>
                                    @if ($art->slide == '1')
                                        Show
                                    @else
                                        Hide
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/'. $art->gambar_artikel) }}" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('artikel.edit', $art->id)}}"
                                        class="btn btn-warning btn-sm">Edit Data</a>

                                    <form action="{{ route('artikel.destroy', $art->id)}}" method="POST" class="d-inline">
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