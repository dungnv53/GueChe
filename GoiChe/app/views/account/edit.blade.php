@include('common.layout')


<div class="content">
{{ Form::open(array('route' => array('accounts.update',$user->id), 'class' => 'pure-form')) }}

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
