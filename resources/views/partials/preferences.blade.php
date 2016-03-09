	<h2>Preferences</h2>
	
	{!! Form::model(Auth::user(), ['method' => 'PATCH', 'route' => 'user.update']) !!}
		
		<div class="form-group">
			{!! Form::label('first_name', 'First name') !!}
   		{!! Form::input('text', 'first_name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('last_name', 'Last name') !!}
   		{!! Form::input('text', 'last_name', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
   		{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
   		{!! Form::label('dynamic_sort', 'Product sorting') !!}
   		<div class="radio">
   			<label>{!! Form::radio('dynamic_sort', 1) !!} Dynamic</label>
   		</div>
   		
   		<div class="radio">
   			<label>{!! Form::radio('dynamic_sort', 0) !!} Classic</label>
   		</div>
		</div>
	
		<p id="update-success" style="display: none;">Your profile has been successfully updated!</p>
		<p id="update-error" style="display: none;">An error occurred!</p>
		{!! Form::submit('Update profile', ['class' => 'btn btn-primary', 'id' => 'user-update']) !!}
		
	{!! Form::close() !!}
	
	