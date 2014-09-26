@include('common.layout')

<div class="content">

<!-- { {  print_r($users->toArray()) } } -->
<!-- <table class="pure-table pure-table-bordered"> -->
<table border="0">

{{ Form::open(array('route' => 'dashboard.store', 'class' => 'pure-form')) }}

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


  <?php $stt = 1; ?>
  @foreach($users as $user)
  <tr id="row_{{ $user['id'] }}">
  	<td width="1%" border="0">
	    <fieldset>
	    {{ $stt++ }}
	    </fieldset>
    </td> 
    <td width="10%">
	    <fieldset>
	    {{ $user['username'] }}
	    </fieldset>
    </td>  
    <td width="10%">
	    <fieldset>
	    <select>

	    @foreach($categories as $cat)
	    <option name="cat_{{ $user['id'] }}" value="{{ $cat['id'] }}" {{ ($cat['id'] == 2) ? "selected=" : ""; }}>
	    	{{ $cat['name'] }}
	    </option>
	    @endforeach

		</select>
	    </fieldset>
    </td>  
    <td width="30%" nowrap>
	    <fieldset>
	    <select>

	    @foreach($che as $ch)
	    <option name="product_{{ $user['id'] }}" value="{{ $ch['id'] }}">
	    	{{ $ch['name'] }}
	    </option>
	    @endforeach
	    	
		</select>
	    {{ Form::button('+') }}
	    {{ Form::button('-') }}
	    </fieldset>

    </td>    
    <td width="5%">
	    <fieldset>
	    {{ Form::text('quantity') }}
	    </fieldset>
    </td>    
    <td width="15%" nowrap>
	    <fieldset>
	    {{ number_format($che[0]['price'],0,'',' ') }}
	    </fieldset>
    </td> 
    <td width="10%">
	    <fieldset>
	    {{ Form::text('Tổng') }}
	    </fieldset>
    </td>    
    <td width="20%" nowrap>
	    <fieldset>
	    {{ Form::button('save') }}
	    {{ Form::button('edit') }}
	    </fieldset>
    </td>
  </tr>
  @endforeach
  
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
  <td colspan="7">
  	 <fieldset>
	    {{ Form::button('save') }}
	    {{ Form::button('stopReserve') }}
	 </fieldset>
  </td>

{{ Form::close() }}
</table>

</div>

<script type="text/javascript">
function number_format(num) {
  return num.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,')
}

</script>

@section('closing')

@stop

@include('common.footer')