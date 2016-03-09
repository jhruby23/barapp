jQuery(document).ready(function($){
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') }
	});
	
	$('#cart').on('click', 'a#empty-cart',function(e){
		e.preventDefault();
		$.ajax({
			url: 'empty-cart',
			type: 'POST',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('body').on('click', 'a[role*="add-to-cart"]', function(e){	
		e.preventDefault();	
		$.ajax({
			url: 'add-to-cart/'+$(this).data('id'),
			type: 'POST',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('#cart').on('click', 'a[role*="remove-from-cart"]', function(e){	
		e.preventDefault();	
		$.ajax({
			url: 'remove-from-cart/'+$(this).data('id'),
			type: 'POST',
		}).done(function(result){
			$('#cart').html(result);
		});
	});
	
	$('#cart').on('click', 'a[role*="checkout"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'checkout',
			type: 'POST',
		}).done(function(result){
			$('#checkout').html(result);
		});
	});
	
	$('#checkout').on('click', 'a[role*="make-order"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'make-order',
			type: 'POST',
		}).done(function(result){
			alert('Order completed!');
			window.location.href = '/';
		});
	});
	
	$('#orders').on('click', 'a[role*="refund"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'refund/'+$(this).data('id'),
			type: 'POST',
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
	
	$('#preferences').on('click', '#user-update', function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).parent('form').attr('action'),
			type: 'PATCH',
			data: $(this).parent('form').serialize(),
		}).success(function(result){
			$('#update-error').hide();
			$('#update-success').show();
		}).error(function(result){
			$('#update-success').hide();
			$('#update-error').show();
		});
	});
	
	$('a#guest').click(function(e){
		e.preventDefault();
		$('input[name="guest"]').click();
	});
});