@include('common.layout')

	<div class="content">
	{{ Form::open(['route' => 'doLogin', 'method' => 'POST' ]) }}
		<h1>Login</h1>

		<p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
		</p>

		<fieldset>
			{{ Form::label('username', 'Name') }}
			{{ Form::text('username', Input::old('username'), array('placeholder' => '')) }}
		</fieldset>

		<fieldset>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</fieldset>

		<fieldset>{{ Form::submit('Login') }}</fieldset>
	{{ Form::close() }}
	</div>

