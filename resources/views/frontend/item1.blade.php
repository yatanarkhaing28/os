@extends('frontendtemplate')
@section('content')
@include('frontend.sidebar')
<div class="col-lg-9">
  <h2>Item Page Filter By brand and subcategory</h2><br>

  <div id="myItems" class="row">

  </div>


</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        showItems(0);
        function showItems(id){
            $.post("{{route('getitems')}}", {sid:id},function(res){
                // console.log(res);
                var html='';
                $.each(res,function(i,v){
                    var url='/itemdetail/'+v.id;

                    html+=`<div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="${v.photo}" alt="" width="120" height="100"></a>
                    <div class="card-body">
                    <h4 class="card-title">
                    <a href="#">${v.name}</a>
                    </h4>
                    <h5>${v.price}</h5>
                    <p class="card-text">${v.description}</p>
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-info cart" data-id="${v.id}" data-name="${v.name}" data-photo="${v.photo}" data-price="${v.price}" data-discount="${v.description}">Add To Cart</a>
                    <a href="${url}" class="btn btn-primary">Detail</a>
                    </div>
                    </div>
                    </div>`;

                })

                $('#myItems').html(html);
            })
        }

        $('.filter').click(function(){
            var id=$(this).data('id');
            showItems(id);
        })
    })
        
    </script>

    <script type="text/javascript" src="{{asset('frontend/js/script.js')}}">

    </script>

    @endsection


		{{-- <div class="row my-4">
        	@foreach($items as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{asset($item->photo)}}" alt="" width="150" height="120"></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$item->name}}</a>
                        </h4>
                        <h5>{{$item->price}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-info cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{asset($item->photo)}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add To Cart</a>
                        <a href="{{route('detailpage',$item->id)}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div> --}}
