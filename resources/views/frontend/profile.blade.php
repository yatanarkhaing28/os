@extends('frontendtemplate')
@section('content')
<div class="col-lg-9 my-4">
	<h2 style="text-align: center;">Customer Profile Page</h2>
	
	<div class="row my-4">

		<div class="col-md-4">
			<img src="{{asset('frontend/frontendimg/s3.jpeg')}}" class="img-fluid">
		</div>

		<div class="col-md-8">
			<h4>Customer Information</h4>
			<p>Name: Yatanar Khaing</p>
			<p>Email Address: ytnk123@gmail</p>
			<p>Phone No: 09782820812</p>
			<p>Address: Meiktila</p>

		</div>	

	</div>
</div>

@endsection