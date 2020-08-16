@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<h2>Brand Create (Form)</h2>


	<div class="row">
		<div class="offset-md-2 col-md-8">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif


			<form method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label for="title">Name</label>
					<input id="title" type="text" name="name" class="@error('title') is-invalid @enderror">
					@error('title')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>

				{{-- <label for="title">Post Title</label>

				<input id="title" type="text" class="@error('title') is-invalid @enderror">

				@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror --}}


				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control-file">
				</div>
				<input type="submit" name="" value="Create" class="btn btn-outline-primary">
			</form>
		</div>
	</div>
</div>
@endsection
