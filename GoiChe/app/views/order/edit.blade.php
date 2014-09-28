@include('common.layout')


<div class="content">

<table border="0" id="buy_list">
{{ Form::open(array('route' => 'orders.store', 'class' => 'pure-form')) }}

  {{ Form::hidden('order_id', $last_order->id) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <thead><tr>
  <th width="1%">
    Stt
  </th>
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

  <tbody>
  <?php $stt = 1; ?>
  @foreach($prod_orders as $order)
  <tr>
    <td width="1%" border="0">
      {{ $stt++ }}
    </td> 
    <td width="10%">
      <select>

      @foreach($categories as $cat)
      <option name="cat[]" value="{{ $cat['id'] }}" {{ ($cat['id'] == $order->cat_id) ? "selected=" : ""; }}>
        {{ $cat['name'] }}
      </option>
      @endforeach

    </select>
    </td>  
    <td width="30%" nowrap>
      <select>

      @foreach($che as $ch)
      <option name="product[]" value="{{ $ch['id'] }}">
        {{ $ch['name'] }}
      </option>
      @endforeach
    </select>
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" value="{{ $order->quantity }}" size="6" />
    </td>    
    <td width="15%" nowrap>
      {{ number_format($order->price,0,'',' ') }}
    </td> 
    <td width="15%" align="right">
      {{ number_format($order->price*$order->quantity,0,'',' ') }}
    </td>    
    <td width="15%" align="center">
      <button type="button" id="plus" name="plus" onclick="addChildRow(this)" >+</button>
      <button type="button"  id="minus" name="minus" onclick="removeChildRow(this)">-</button>
    </td>
  </tr>
  @endforeach
  </tbody>

  <tr>
  <td colspan="4" class="steelBlue">&nbsp</td>
  <td class="steelBlue">&nbsp</td>
  <td class="steelBlue" id="total_cell">{{ number_format($order->price*$order->quantity,0,'',' ') }}</td>
  <td align="right" class="steelBlue">
      {{ Form::button('save') }}
      {{ HTML::linkRoute('orders.index', 'Cancel') }}
  </td>

{{ Form::close() }}
</table>

{{ Form::close() }}

</div>
