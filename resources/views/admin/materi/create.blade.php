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
						<div class="card-title">Form Materi</div>
                        <a href="{{ route('materi.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">

					<form action="{{ route ('materi.store')}}" method="post" enctype="multipart/form-data">
						@csrf
					
						<div class="form-group">
							<label for="judul">Judul Materi</label>
							<input type="text" name="judul_materi" class="form-control" id="text" placeholder="Enter Judul">
						</div>

						<div class="form-group">
							<label for="body">Paragraf Awal</label>
							<textarea name="body" id="editor" class="form-control"></textarea>
						</div>

                        <div class="form-group">
							<label for="body">Body</label>
							<textarea name="body" id="basic-conf" class="form-control"></textarea>
						</div>

                        <div class="form-group">
							<label for="kategori">Kategori</label>
							<select name="kategori_id" class="form-control">
                                @foreach ($kategori as $kat)
                                
                                <option value="{{ $kat->id }}"> {{ $kat->nama}}</option>

                                @endforeach
                            </select>
						</div>

                        <div class="form-group">
							<label for="gambar">Gambar Materi</label>
							<input type="file" name="gambar_materi" class="form-control">
						</div>

						<div class="form-group">
						
							<button class="btn btn-primary btn-sm" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm" type="reset">Reset</button>
						
						</div>
		
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection