@include('common.layout')

<div class="content">

<!-- { {  print_r($users->toArray()) } } -->
<table class="pure-table pure-table-bordered">
{{ Form::open(array('route' => 'dashboard.store', 'class' => 'pure-form')) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  <tr>
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
  </tr>


  <?php $stt = 0; ?>
  @foreach($users as $user)
  <tr>
  	<td width="1%">
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
    <td width="15%">
	    <fieldset>
	    {{ Form::text('cost') }}
	    </fieldset>
    </td> 
    <td width="10%">
	    <fieldset>
	    {{ Form::text('Tổng') }}
	    </fieldset>
    </td>    
    <td width="20%">
	    <fieldset>
	    {{ Form::button('save') }}
	    {{ Form::button('edit') }}
	    </fieldset>
    </td>
  </tr>
  @endforeach
  
  <tr>
  	<td colspan="6">
  		<h2>Thống kê số lượng chè đã đặt.</h2>
  	<td>
  </tr>
  <tr>
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
	<th width="15%">
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
  <td colspan="6">
  	 <fieldset>
	    {{ Form::button('save') }}
	    {{ Form::button('stopReserve') }}
	 </fieldset>
  </td>
  <tr>

  </tr>
{{ Form::close() }}
</table>

</div>

@include('common.footer')