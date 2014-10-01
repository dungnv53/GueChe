@include('common.layout')

 <div class="content">
 <p>
  @if(!empty($session))
  Thời gian đặt chè ngày {{$session->date}} : Từ {{ $session->start }} đến {{ $session->end }}
  @endif
 </p>
 
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
  {{-- dd($prod_orders) --}}

  @foreach($prod_orders as $order)
  <tr>
  	<td width="1%" border="0">
	    {{ $stt++ }}
    </td> 
    <td width="10%">

    	{{ $order->getCategory()->name }}

    </td>  
    <td width="30%" nowrap>
      {{ $order->getProduct()[0]['name'] }}
    </td>    
    <td width="5%" align="center">
      {{ $order->quantity }}
    </td>    
    <td width="15%" nowrap>
      {{ number_format($order->getProduct()[0]['price'],0,'',' ') }}
    </td> 
    <td width="10%">
      {{ number_format($order->getProduct()[0]['price']*$order->quantity,0,'',' ') }}
    </td>    
    <td width="20%" align="center">
    @if(date('H:i:s')<= $session->end)
    {{ HTML::linkRoute('orders.edit','Edit', $order->order_id) }}
    @else
     End time edit
     @endif
    </td>
  </tr>
  @endforeach
  </tbody>
 
</table> 

 @endif
 <!-- @ else -->
  <!-- Hôm nay không đặt hàng được  -->
 <!-- @ endif -->
</div>
