jQuery(document).ready(function($){
	$('#cart').on('click', 'a#empty-cart',function(e){
		e.preventDefault();
		$.ajax({
			url: 'empty-cart',
			type: 'GET',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('a[role*="add-to-cart"]').on('click', function(e){	
		e.preventDefault();	
		$.ajax({
			url: 'add-to-cart/'+$(this).data('id'),
			type: 'GET',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('#cart').on('click', 'a[role*="remove-from-cart"]', function(e){	
		e.preventDefault();	
		$.ajax({
			url: 'remove-from-cart/'+$(this).data('id'),
			type: 'GET',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('#cart').on('click', 'a[role*="checkout"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'checkout',
			type: 'GET',
		}).done(function(result){
			$('#checkout').html(result);
		});
	});
	
	$('#checkout').on('click', 'a[role*=make-order]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'make-order',
			type: 'GET',
		}).success(function(result){
			alert('Order completed!');
			window.location.href = '/';
		});
	});
});