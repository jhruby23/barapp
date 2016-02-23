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
	
	$('body').on('click', 'a[role*="add-to-cart"]', function(e){	
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
	
	$('#checkout').on('click', 'a[role*="make-order"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'make-order',
			type: 'GET',
		}).done(function(result){
			alert('Order completed!');
			window.location.href = '/';
		});
	});
	
	$('#orders').on('click', 'a[role*="refund"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'refund/'+$(this).data('id'),
			type: 'GET',
		}).done(function(result){
			$('#orders').html(result);
		});
	});
	
	$('.nav a[href*="#"]').click(function(e){
		e.preventDefault();
		$el = $(this).attr('href');
		$('.offer').hide();
		$($el).show();
		$(this).parent().siblings('li').removeClass('active');
		$(this).parent().addClass('active');
	});
	
	$('a#guest').click(function(e){
		e.preventDefault();
		$('input[name="guest"]').click();
	});
});