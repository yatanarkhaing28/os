$(document).ready(function(){

	getData();
	count();

	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
	});



	$('.row').on('click','.view_detail',function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var brand = $(this).data('brand');
		var subcategory = $(this).data('subcategory');
		var description = $(this).data('description');

		$(".pimg").attr('src',"backend/"+photo);
		$(".pname").html(name);		
		$(".pprice").html(price);
		$(".pbrand").html(brand);
		$(".psubcategory").html(subcategory);
		$(".pdiscount").html(discount);
		$(".pdescription").html(description);
		$(".cart").attr({'data-cid':id,'data-cname':name,'data-cphoto':photo,'data-cprice':price,'data-cdiscount':discount});


	});

	// Count
	function count(){
		var shopString = localStorage.getItem("heinshop");
		if (shopString) {
			var shopArray = JSON.parse(shopString);
			if (shopArray!=0) {
				var count=shopArray.length;
				$("#item_count").text('('+count+')');
			}else {
				$("#item_count").text('()');	
			}

		}else {
			$("#item_count").text('()');	
		}
	};


	// Add To Cart
	$(".cart").on('click',function(){
		// alert("LOL");
		var item_qty=parseInt($('#qty').val());
		var id = $(this).data('id');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var qty=1;
		if (item_qty) {
			qty+=item_qty;
		}

		var shop_item = {
			id:id,
			name:name,
			price:price,
			discount:discount,
			photo:photo,
			qty:qty
		}

		var shopString = localStorage.getItem("heinshop");
		var shopArray;
		if (shopString==null) {
			shopArray=Array();
		}else {
			shopArray=JSON.parse(shopString);
		}

		var status = false;
		$.each(shopArray,function(i,v){
			if (id==v.id) {
				status = true;
				if (!item_qty) {
					v.qty++;
				}else{
					v.qty+=item_qty;
				}
			}
		})

		if (status==false) {
			shopArray.push(shop_item);

		}

		var shopData = JSON.stringify(shopArray);
		localStorage.setItem("heinshop", shopData);
		count();

	});

	// Show to Table Data
	function getData(){
		var shopString = localStorage.getItem("heinshop");
		if (shopString) {
			var shopArray = JSON.parse(shopString);

			var html='';
			var no=1;
			var total=0;
			$.each(shopArray,function(i,v){
				var photo=v.photo;
				var name = v.name;
				var unit_price = v.price;
				var discount = v.discount;
				var qty = v.qty;
				if (discount) {
					var price_show=discount+'<del class="d-block">'+unit_price+'</del>';
					var price = discount;
				}else{
					var price_show = unit_price;
					var price = unit_price;
				}

				html += `<tr>
						<td>${no++}</td>
						<td class="w-50"><img src="${photo}" class="w-50"></td>
						<td>${name}</td>
						<td>${price_show}</td>
						<td class="w-50"><button class="btn btn-light btn-sm min" data-item_i="${i}">-</button> ${qty} <button class="btn btn-light btn-sm max" data-item_i="${i}">+</button></td>
						<td>${price*qty}</td>

					</tr>`;	

					total += price*qty;
			});

			html+=`<tr>
				<td colspan="5">Total</td>
				<td>${total}</td>
				</tr>`

			$("tbody").html(html);
			$(".total").val(total);


		}else{
			html='';
			$("tbody").html(html);
		}

	}



	$("tbody").on('click','.max',function(){

		var item_i = $(this).data('item_i');

		var shopString = localStorage.getItem("heinshop");
		if (shopString) {

			var shopArray = JSON.parse(shopString);

			$.each(shopArray,function(i,v){
				if (item_i==i) {
					v.qty++;
				}

			})

			var shopData=JSON.stringify(shopArray);
			localStorage.setItem("heinshop",shopData);
			getData();
			count();

		}

	});

	$("tbody").on('click','.min',function(){
		var item_i = $(this).data('item_i');

		var shopString = localStorage.getItem("heinshop");
		if (shopString) {

			var shopArray = JSON.parse(shopString);

			$.each(shopArray,function(i,v){
				if (item_i==i) {
					v.qty--;
					if (v.qty==0) {
						shopArray.splice(item_i,1);
					}
				}

			})

			var shopData=JSON.stringify(shopArray);
			localStorage.setItem("heinshop",shopData);
			getData();
			count();

		}

	})

	// For Buy Now
	$('.buy_now').on('click',function(){
		var notes=$('.notes').val();
		// var total=$('.total').val();
		// alert(notes);
		var shopString=localStorage.getItem("heinshop");
		if (shopString) {
			// var shopArray=JSON.parse(shopString);
			$.post('/orders',{shop_data:shopString,notes:notes},function(response){
			//console.log(response);
			if (response) {
				alert(response);
				localStorage.clear();
				getData();
				location.href="/";
			}
		
	})
}

})

})