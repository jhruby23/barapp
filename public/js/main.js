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
	
	$timer = null;
	$('#cart').on('click', 'a[role*="checkout"]', function(e){
		e.preventDefault();
		$.ajax({
			url: 'checkout',
			type: 'POST',
		}).done(function(result){
			$('[data-remodal-id=checkout]').html(result);
			$('[data-remodal-id=checkout]').remodal().open();
			$timeText = $('[data-remodal-id=checkout]').find('p#autocheckout span');
			$timer = setInterval(function(){
				$time = $timeText.text();
				if($time == 1){
					$('button[data-remodal-action="confirm"]').trigger('click');
					clearInterval($timer);
				}
				$timeText.text($time-1);
			}, 1000);
		});
	});
	
	$(document).on('confirmation', '[data-remodal-id=checkout]', function () {
		$.ajax({
			url: 'make-order',
			type: 'POST',
		}).done(function(result){
			alert('Order completed!');
			window.location.href = '/logout';
		});
	});
	
	$(document).on('cancellation', '[data-remodal-id=checkout]', function () {
		clearInterval($timer);
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
	
	$i = -1;
	$('button#add-category').click(function(e){
		e.preventDefault();
		$new = $('div.category-edit').last().clone(true).appendTo('form .editboxes');
		$new.find('button span.val').text('');
		$new.find('input[type="text"]').val('');
		$new.find('input[type="hidden"]').val('');
		$new.find('input[type="text"]').attr('name', $i+'[name]');
		$new.find('input[type="hidden"]').attr('name', $i+'[type]');
		$i--;
	});
	
	$('ul.dropdown-menu li').on('click', 'a', function(e){
		e.preventDefault();
		$name = $(this).data('name');
		$id = $(this).data('id');
		$ul = $(this).parent('li').parent('ul');
		$ul.siblings('button').children('span.val').text($name);
		$ul.parent('div').siblings('input[type="hidden"]').val($id);
		
		if($val == 'remove')
			$ul.parent('div').parent('div').parent('div').hide();
	});
	
	$(document).on('confirmation', '.remodal', function () {
		//alert('Confirmation button is clicked');
	});
	
	$(document).on('cancellation', '.remodal', function () {
		//alert('Cancel button is clicked');
	});
});