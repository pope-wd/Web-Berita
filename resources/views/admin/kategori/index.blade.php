@extends('template-backend.default')

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
                        <div class="card-title">Data Kategori</div>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah Kategori</a>
                    </div>
                </div>
                @if(Session::has('success'))

                        <div class="alert alert-primary">
                            {{ Session('success')}}
                        </div>

                @endif

                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategori as $kat)
                            <tr>
                                <td>{{ $kat->id }}</td>
                                <td>{{ $kat->nama }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kat->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="btn btn-danger btn-sm">
    
                                            <i class="">Delete</i>
    
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

@endsection