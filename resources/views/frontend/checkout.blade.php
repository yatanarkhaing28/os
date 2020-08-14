@extends('frontendtemplate')
@section('content')
	<div class="col-lg-9">



<div id="checkout_body">
	<div class="container my-5 text-center">
		<div class="row">
			<div class="offset-md-2 col-md-8">
				<h3 class="py-3">Check Out</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Photo</th>
								<th>Item Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Sub Total</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="offset-md-2 col-md-8">
				<div class="form-group">
					<textarea class="form-control notes" placeholder="Note"></textarea>
					<input type="hidden" name="" class="total">
				</div>
			</div>

			<div class="offset-md-2 col-md-4 text-left">
				<a href="{{route('homepage')}}" class="btn btn-info">Continue Shopping</a>
			</div>

			@auth
			<div class="offset-md-2 col-md-4 text-left">
				
				<a href="#" class="btn btn-primary buy_now">Checkout</a>
			@else
				<a href="{{route('login')}}" class="btn btn-info float-right">Login To CheckOut</a>
			@endauth
				
			</div>
		</div>
	</div>
</div>
</div>



@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend/js/script.js')}}">
    
  </script>
@endsection