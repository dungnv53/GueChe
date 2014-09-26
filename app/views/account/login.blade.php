@include('common.layout')
abc

	{{ Form::open(['route' => 'doLogin', 'method' => 'POST' ]) }}
		<h1>Login</h1>

		<p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('username', 'Name') }}
			{{ Form::text('username', Input::old('username'), array('placeholder' => '')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Login') }}</p>
	{{ Form::close() }}

