@extends('frontendtemplate')
@section('content')

<div class="col-lg-9 my-5">
	<h2>Item Detail Page Filter By brand and subcategory</h2>
	<div class="row">

		<div class="col-md-4">
			<img src="{{asset('frontend/frontendimg/acer1.jpeg')}}" class="img-fluid">
		</div>

		<div class="col-md-8">
			<h4>Item Information</h4>
			<p>Item Name: Acer</p>
			<p>Item Price: 700000</p>
			<p>Item Description: Laptop</p>

		</div>	

		</div>

</div>


@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend/js/script.js')}}">
    
  </script>
@endsection