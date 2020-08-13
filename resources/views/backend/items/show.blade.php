@extends('backendtemplate')
@section('content')
	<div class="container-fluid">
		<h2>Item Detail (Your UI)</h2>
		<table class="table table-bordered">
		<thead>
			<tr>
				
				<th>Code No</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				
			</tr>
		</thead>
		<tbody>

			
			<tr>
				
				<td>{{$item->codeno}}</td>
				<td><img src="{{asset($item->photo)}}" width="80" height="50"></td>
				<td>{{$item->name}}</td>
				<td>{{$item->price}} MMK</td>
				<td>{{$item->description}}</td>
			</tr>

		</tbody>
	</table>

 
	</div>

@endsection


<!-- <div class="row">
	<div class="col-md-4">
		<img src="{{asset($item->photo)}}" class="img-fluid">
	</div>
	<div class="row">
	<div class="col-md-8">
		<table class="table table-bordered">
		<thead>
			<tr>
				
				<th>Code No</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				
			</tr>
		</thead>
		<tbody>

			
			<tr>
				
				<td>{{$item->codeno}}</td>
				<td><img src="{{asset($item->photo)}}" class="img-fluid"></td>
				<td>{{$item->name}}</td>
				<td>{{$item->price}} MMK</td>
				<td>{{$item->description}}</td>
			</tr>

		</tbody>
	</table>
	
	</div>
	</div>
</div> -->