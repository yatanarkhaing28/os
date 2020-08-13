@extends('backendtemplate')
@section('content')
	<div class="container-fluid">
		<h2>Item Detail (Your UI)</h2>
		{{-- <table class="table table-bordered">
		<thead>
			<tr>
				
				<th>Code No</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				<th>Brand</th>
				<th>Subcategory</th>
				
			</tr>
		</thead>
		<tbody>

			
			<tr>
				
				<td>{{$item->codeno}}</td>
				<td><img src="{{asset($item->photo)}}" width="80" height="50"></td>
				<td>{{$item->name}}</td>
				<td>{{$item->price}} MMK</td>
				<td>{{$item->description}}</td>
				<td>{{$item->brand->name}}</td>
				<td>{{$item->subcategory->name}}</td>
			</tr>

		</tbody>
	</table> --}}
<div class="row">
	
	<div class="col-md-4">
		<img src="{{asset($item->photo)}}" class="img-fluid">
	</div>
	
	<div class="col-md-8">
	<h4>Item Information</h4>

	<p>Code No: {{$item->codeno}}</p>

	<p>Name: {{$item->name}}</p>
	<p>Price:{{$item->price}} MMK</p>
	<p>Description: {{$item->description}}</p>
	
	</div>	

	</div>

</div>
 
	

@endsection


			
		
		

	

