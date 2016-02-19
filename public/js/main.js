jQuery(document).ready(function($){
	$('#cart').on('click', 'a#empty-cart',function(e){
		e.preventDefault();
		$.ajax({
			url: '/empty-cart',
			type: 'GET',
		}).done(function(result1){
			$('#cart').html(result1);
		});
	});
	
	$('a[role*="add-to-cart"]').on('click', function(e){	
		e.preventDefault();	
		$.ajax({
			url: '/add-to-cart/'+$(this).data('id'),
			type: 'GET',
		}).done(function(result2){
			$('#cart').html(result2);
		});
	});
	
	$('#cart').on('click', 'a[role*="remove-from-cart"]', function(e){	
		e.preventDefault();	
		$.ajax({
			url: '/remove-from-cart/'+$(this).data('id'),
			type: 'GET',
		}).done(function(result3){
			$('#cart').html(result3);
		});
	});
});