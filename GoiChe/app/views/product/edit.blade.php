@include('common.layout')
<div class="content">
{{ Form::open(['route' => ['products.update1',$product->id]]) }}

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
            <option  value="{{ $cat['id'] }}" {{ ($cat['name'] == $product->category->name) ? "selected=" : ""; }}>
                {{ $cat['name'] }}
            </option>
        @endforeach

    </select>
    
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name',Input::old('name',$product->name)) }}
    </fieldset>
  </div> 

  <div>
    <fieldset>
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price',Input::old('price',$product->price)) }}
    </fieldset>
  </div>

  <div>
    <fieldset>
    {{ Form::label('unit', 'Unit') }}
    {{ Form::text('unit',Input::old('unit',$product->unit)) }}
    </fieldset>
  </div>

  {{ Form::submit('Update') }}

{{ Form::close() }}

</div>