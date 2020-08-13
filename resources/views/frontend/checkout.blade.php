@extends('frontendtemplate')
@section('content')
	<div class="col-lg-9">



<div id="checkout_body">
	<div class="container my-5 text-center">
		<div class="row">
			<div class="offset-md-2 col-md-8">
				<h3 class="py-3">Check Out</h3>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Item Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Sub Total</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Acer</td>
								<td>700000</td>
								<td><button class="min btn btn-outline-secondary btn-sm mx-2">-</button>1<button class="max btn btn-outline-secondary btn-sm mx-2">+</button></td>
								<td>700000</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Mouse</td>
								<td>15000</td>
								<td><button class="min btn btn-outline-secondary btn-sm mx-2">-</button>2<button class="max btn btn-outline-secondary btn-sm mx-2">+</button></td>
								<td>300000</td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="offset-md-2 col-md-8">
				<div class="form-group">

					<input type="hidden" name="" class="total">
				</div>
			</div>

			<div class="offset-md-2 col-md-4 text-left">
				<a href="product.php" class="btn btn-info">Continue Shopping</a>
			</div>
			<div class="offset-md-2 col-md-4 text-left">
				
				<button class="btn btn-primary buy_now">Buy Now</button>
				
			</div>
		</div>
	</div>
</div>
</div>



@endsection