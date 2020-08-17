 <div class="col-lg-3">

 	<h1 class="my-4">Shop Name</h1>
 	<div class="list-group">
 		@foreach($subcategories as $subcategory)
 		{{-- <a href="{{route('itemspage')}}" class="list-group-item">Category 1</a>
 		<a href="#" class="list-group-item">Category 2</a> --}}
 		<a href="#" class="list-group-item filter" data-id="{{$subcategory->id}}">{{$subcategory->name}}</a>
 		@endforeach
 	</div>

 </div>