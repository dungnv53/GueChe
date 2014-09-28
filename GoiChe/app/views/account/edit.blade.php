@include('common.layout')


<div class="content">
{{ Form::open(array('route' => 'accounts.store', 'method' => 'POST')) }}
{{-- Form::open(['route' => ['accounts.update1',$user->id]]) --}}

  {{ Form::hidden('user_id', $user->id) }}
  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <div>
    <fieldset>
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username',Input::old('username',$user->username)) }}
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    </fieldset>
  </div> 

  <div>
    <fieldset>
    {{ Form::label('confirm_password', 'Confirm Password') }}
    {{ Form::password('confirm_password') }}
    </fieldset>
  </div>
  <div>
    <fieldset>
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email',Input::old('email', $user->email)) }}
    </fieldset>
  </div> 

  <div>
    <fieldset>
    {{ Form::label('role_id', 'Role'  ) }}
    {{ Form::text('role_id', Input::old('role_id', $user->role_id)) }}
    </fieldset>
  </div>

  {{ Form::submit('Update') }}

{{ Form::close() }}

</div>
