@include('common.layout')
<div class="content">
{{ Form::open(array('route' => 'products.store', 'class' => 'pure-form')) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <div>
    <fieldset>
    {{ Form::label('cat_id', 'Category') }}
   
    <select name="cat_id"> 

        @foreach($categories as $cat)
            <option  value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
                {{ $cat['name'] }}
            </option>
        @endforeach

    </select>
    
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}
    </fieldset>
  </div> 

  <div>
    <fieldset>
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price') }}
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('unit', 'Unit') }}
    {{ Form::text('unit') }}
    </fieldset>
  </div>

  {{ Form::submit('Create') }}

{{ Form::close() }}

</div>