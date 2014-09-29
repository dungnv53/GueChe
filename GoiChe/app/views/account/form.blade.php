@include('common.layout')


<div class="content">
{{ Form::open(array('route' => 'accounts.store', 'class' => 'pure-form')) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <div>
    <fieldset>
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username') }}
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('fullname', 'Fullname') }}
    {{ Form::text('fullname') }}
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
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email') }}
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('role_id', 'Role') }}
    {{ Form::text('role_id') }}
    </fieldset>
  </div>

  {{ Form::submit('Create') }}

{{ Form::close() }}

</div>