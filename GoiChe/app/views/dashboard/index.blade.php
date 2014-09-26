@include('common.layout');

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


  <?php $stt = 0; ?>
  @foreach($users as $user)
  <tr>
  	<td>
	    <fieldset>
	    {{ $stt++ }}
	    </fieldset>
    </td> 
    <td>
	    <fieldset>
	    {{ $user['username'] }}
	    </fieldset>
    </td>  
    <td>
	    <fieldset>
	    {{ Form::text('product') }}
	    </fieldset>
    </td>    
    <td>
	    <fieldset>
	    {{ Form::text('quantity') }}
	    </fieldset>
    </td>    
    <td>
	    <fieldset>
	    {{ Form::text('cost') }}
	    </fieldset>
    </td>    
    <td>
	    <fieldset>
	    {{ Form::button('save') }}
	    {{ Form::button('edit') }}
	    </fieldset>
    </td>
  </tr>
  @endforeach

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
  	
  </tr>
{{ Form::close() }}
</table>

</div>