@include('common.layout')

 <div class="content">

 @if(empty($prod_orders))

 <fieldset>
 <p>Bạn chưa đặt món ăn nào.</p>
 <a id="btn-back" href="{{ route('orders.create') }}">Order</a>
 </fieldset>
 @else
<table border="0" id="buy_list" class="responstable2">
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
  {{-- print_r($prod_orders) --}}
  @foreach($prod_orders as $order)

  <tr>
  	<td width="1%" border="0">
	    {{ $stt++ }}
    </td> 
    <td width="10%">

    	{{ $order->name }}

    </td>  
    <td width="30%" nowrap>

	    {{ Product::where('id', '=', $order->product_id)->lists('name')[0] }}
	   	
    </td>    
    <td width="5%" align="center">
	    {{ $order->quantity }}
    </td>    
    <td width="15%" nowrap>
	    {{ number_format($order->price,0,'',' ') }}
    </td> 
    <td width="10%">
	    {{ number_format($order->price*$order->quantity,0,'',' ') }}
    </td>    
    <td width="20%" align="center">
 		{{ HTML::linkRoute('orders.edit','Edit', 12) }}
    </td>
  </tr>
  @endforeach
  </tbody>
 
</table> 

 @endif
</div>
