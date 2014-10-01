@include('common.layout')

 <div class="content">
 <fieldset style="width:700px">
 
 {{ Form::open(array('route' => 'changePassword.update', 'method' => 'POST')) }}
 {{-- Form::open(['route' => ['changePassword.update',$user->id]]) --}}
<h1 style="text-align:center; color:blue">Change password</h1>
  
  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <div>
   
    {{ Form::label('old_password', 'Old Password: ') }}
    {{ Form::password('old_password') }}
    
  </div> <br/>
    <div>
   
    {{ Form::label('new_password', 'New Password: ') }}
    {{ Form::password('new_password') }}
    
  </div> <br/>

  <div>
  
    {{ Form::label('confirm_password', 'New Password again:') }}
    {{ Form::password('confirm_password') }}
    
  </div><br/>
  
  {{ Form::submit('Update') }}
 <button><a id="btn-back" href="{{ route('home') }}">Cancel</a></button>
{{ Form::close() }}
 </fieldset>
</div>
