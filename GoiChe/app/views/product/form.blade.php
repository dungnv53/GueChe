@include('common.layout')


<div class="content">
{{ Form::open(array('route' => 'products.store')) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  {{-- $ user['username'] --}}
  {{-- Hien ten day du cho user --}}
  <table border="0" id="buy_list">

  <thead><tr>
  <th width="10%">
    Loại
  </th>
  <th width="25%">
    Đồ ăn
  </th>
  <th width="5%">
    Số lượng
  </th>
  <th width="15%">
    Giá
  </th>
  <th width="10%">
    Tổng 
  </th>
  <th width="20%">
    Thao tác
  </th>
  </tr></thead>

  <tr> 
    <td width="10%">
      <select>

      @foreach($categories as $cat)
      <option name="cat" value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
        {{ $cat['name'] }}
      </option>
      @endforeach

    </select>
    </td>  
    <td width="30%" nowrap>
      <select>

      @foreach($che as $ch)
      <option name="product" value="{{ $ch['id'] }}">
        {{ $ch['name'] }}
      </option>
      @endforeach
    </select>
        
      {{ Form::button('+') }}
      {{ Form::button('-') }}

    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity" size="6" />
    </td>    
    <td width="15%" nowrap>
      {{ number_format($che[0]['price'],0,'',' ') }}
    </td> 
    <td width="10%">
      {{ 0 }}
    </td>    
    <td width="20%" nowrap>
      {{ Form::button('save') }}
      {{ Form::button('edit') }}
    </td>
  </tr>
 
  <tr class="tfoot">
  <td colspan="4">&nbsp</td>
  <td colspan="3">
  {{ Form::submit('Create') }}
  </td>
  </tr>

{{ Form::close() }}

</div>