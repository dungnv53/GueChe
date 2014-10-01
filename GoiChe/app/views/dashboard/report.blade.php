@include('common.layout')

<div class="content">

<!-- { {  print_r($users->toArray()) } } -->
<div class="cur_time">Current time: {{ date('F j, Y, g:i A') }} </div>
<p>
	<h2>Danh sách đặt chè</h2>
</p>
<table border="0">
  <thead><tr>
	<th width="1%">
		Stt
	</th>
	<th width="25%">
	  Đồ ăn
	</th>	
	<th width="5%" nowrap>
		Số lượng
	</th>
	<th width="15%">
		Giá
	</th>
	<th width="10%">
		Tổng 
	</th>
  <th width="5%">
    Thao tác
  </th>
  </tr></thead>

  <?php $stt=0; $total = 0; ?>
  <tbody>
  	@foreach($list as $order) 
  	<tr>
  		<td>{{ ++$stt }}</td>
  		<td>{{ $order->getProduct()[0]['name'] }}</td>
  		<td>{{ $order->countProduct() }}</td>
  		<td>{{ number_format($order->getProduct()[0]['price'], 0, '', ' ') }}</td>
  		<?php $total += $order->getProduct()[0]['price']*$order->countProduct(); ?>
  		<td align="center">{{ number_format($order->getProduct()[0]['price']*$order->countProduct(), 0, '', ' ') }}</td>
      <td>{{ HTML::linkRoute('report.detail','Chi tiết')}}</td>
  	</tr>
  	@endforeach
  	<tr>
  		<td colspan="4" class="seaGreen">Tổng đơn hàng</td>
  		<td class="seaGreen">{{ number_format($total, 0, '', ' ') }}</td>
      <td class="seaGreen">{{ HTML::linkRoute('dashboard.index','Cancel') }}</td>
  	</tr>
  </tbody>

</table>