@include('common.layout')

<div class="content">

<!-- { {  print_r($users->toArray()) } } -->
<div class="cur_time">Current time: {{ date('F j, Y, g:i A') }} </div>
<table border="0" id="buy_list" class="responstable2">

{{ Form::open(array('route' => 'dashboard.store')) }}

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
		Tên
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
  @foreach($users as $user)
  <tr id="row_{{ $user['id'] }}">
  	<td width="1%" border="0">
	    {{ $stt++ }}
    </td> 
    <td width="10%">
	    {{ $user['fullname'] }}
    </td>  
    <td width="10%">
	    <select>

	    @foreach($categories as $cat)
	    <option name="cat_{{ $user['id'] }}" value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
	    	{{ $cat['name'] }}
	    </option>
	    @endforeach

		</select>
    </td>  
    <td width="30%" nowrap>
	    <select>

	    @foreach($che as $ch)
	    <option name="product_{{ $user['id'] }}" value="{{ $ch['id'] }}">
	    	{{ $ch['name'] }}
	    </option>
	    @endforeach
		</select>
	    	
	    {{ Form::button('+') }}
	    {{ Form::button('-') }}

    </td>    
    <td width="5%" align="center">
	    <input type="text" name="quantity_{{ $user['id'] }}" size="6" />
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
  @endforeach
  </tbody>

  <br/><br />
  <tr>
  	<td colspan="8" style="text-align: center;" class="seaGreen">
  	Tổng đơn hàng
  	</td>
  </tr>
  <tr class="tfoot">
  	<th width="5%">
		Stt
	</th>
	<th width="15%">
		Tên
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
	<th width="15%" colspan="3">
		Thao tác
	</th>
  </tr>
  <tr>
  	<td>1</td>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td></td>
  </tr>
  <tr>
  <td colspan="7" align="right">
	    {{ Form::button('save') }}
	    {{ Form::button('stopReserve') }}
  </td>
  <td></td>

{{ Form::close() }}
</table>

</div>

<script type="text/javascript">
function number_format(num) {
  return num.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,')
}

$(document).ready(function() {
});

</script>

@section('closing')

@stop

@include('common.footer')