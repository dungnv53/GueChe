@include('common.layout')

<div class="content">

<!-- { {  print_r($users->toArray()) } } -->
<div class="cur_time">Current time: {{ date('F j, Y, g:i A') }} </div>
<table border="0" id="buy_list">

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
    <td width="10%" id="cat_row_{{$user['id']}}">
    	@if($user->getCurOrder())
    	<!-- { { print_r($user->getCurOrder()->getProdOrder()) } } -->
    	  @foreach($user->getCurOrder()->getProdOrder() as $prod_order) 
    	  <?php $product = $prod_order->getProduct() ?>
    	  	<select id="cat_{{$user['id']}}" name="cat_{{$user['id']}}[]">

		    @foreach($categories as $cat)
			    <option value="{{ $cat['id'] }}" {{ ($product[0]['cat_id'] == $cat['id']) ? "selected=" : ""; }}>
			    	{{ $cat['name'] }}
			    </option>
			@endforeach
			</select>
		  	<br />
		  @endforeach

    	@else
	    <select id="cat_{{$user['id']}}" name="cat_{{$user['id']}}[]">

	    @foreach($categories as $cat)
	    <option value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
	    	{{ $cat['name'] }}
	    </option>
	    @endforeach

		</select>

		@endif


    </td>  
    <td width="30%" nowrap>
	    <select>

	    @foreach($che as $ch)
	    <option name="product_{{ $user['id'] }}" value="{{ $ch['id'] }}">
	    	{{ $ch['name'] }}
	    </option>
	    @endforeach
		</select>
	    	
	    <button type="button" id="plus" name="plus_{{$user['id']}}" class="btn_add" >+</button>
      	<button type="button"  id="minus" name="minus_{{$user['id']}}" onclick="removeChildRow(this)">-</button>
    </td>    
    <td width="5%" align="center" id="qty_row_{{$user['id']}}">
	    <input type="text" name="quantity_{{ $user['id'] }}[]" size="6" class="qty_row" />
    </td>    
    <td width="15%" nowrap>
	    {{ number_format(8000,0,'',' ') }} {{--$che[0]['price']--}}
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

  <tr>
  	<td colspan="8" style="background: #FFFFFF">&nbsp</td>
  </tr>
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
  	<td class="steelBlue">1</td>
  	<td class="steelBlue">&nbsp</td>
  	<td class="steelBlue"></td>
  	<td class="steelBlue"></td>
  	<td class="steelBlue"></td>
  	<td class="steelBlue"></td>
  	<td class="steelBlue"></td>
  </tr>
  <tr>
  <td colspan="4" class="steelBlue">&nbsp</td>
  <td class="steelBlue">&nbsp</td>
  <td colspan="3" align="right" class="steelBlue">
	    {{ Form::button('save') }}
	    {{ Form::button('stopReserve') }}
  </td>

{{ Form::close() }}
</table>

<div id="hidden_item">
    <select id="cat_hid_{{$user['id']}}" style="display:none">

    @foreach($categories as $cat)
    <option name="cat_{{ $user['id'] }}" value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
    	{{ $cat['name'] }}
    </option>
    @endforeach

	</select>
</div>

</div>

<script type="text/javascript">
    function number_format(num) {
      return num.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,')
    }

    var s = new Array();
    <?php
        // foreach ($services as $service) {
        //     echo "s[".$service->getId()."] = ".$service->getFee().";\n";
        // }
    ?>
    

    function checked_click(id) {
        var checked = $('#checkbox_'+id).attr('checked');
        if (checked) {
          $('#input_number_rental_'+id).val(1);
          $('#number_rental_'+id).html(1);
        } else {
          $('#input_number_rental_'+id).val(0);
          $('#number_rental_'+id).html(0);
        }
        updateFee();
      }
    
    function updateFee(fee) {
      // console.log(fee);
      var total = 0;

      $('.food_row').each(function() {
        var cur_qty = $(this).find("input:text").val();
        var cur_price = parseInt($(this).find('span.price_cell').html());
        // console.log(cur_price);
        $(this).find('span#total').html(cur_qty*cur_price*1000); //fix me
      });
      $('.total').each(function(){
        total += parseInt($.trim($(this).html().toString()));
      });
      // fix me
      $('#total_cell').text(total+ ' 000');
    }

    function addChildRow(cur_row) {
        var length = $('tr#row'+cur_row+'input[type=select]').length;
        alert(length);

        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('#buy_list tr.food_row:last').find("input:text").val("");
        $('#buy_list tr.food_row:last').find("td:first").text(++length);
        $('.numbersOnly').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        // checkLength();
        // updateFee();
    }
    function removeChildRow(cur_row) {
       if(checkLength()) {
         $('#buy_list tr.food_row:last').remove();
         updateFee();
       }
    }

    function minus(id) {

     }
      
     function plus(id) {

     }
      
    function checkLength() {
      length = $('tr.food_row').length;
      if(length < 2) {
        return false;
      }
      return length;
    }
    
  $(document).ready(function() {
    // checkLength();
    // updateFee();
    $('.btn_add').click(function(event) {
    	console.log(event.target.name);
    	var btn_id = event.target.name;
    	var row_id = /[^_]*$/.exec(btn_id)[0];
    	addChildRow(row_id);
    });
    
    $('.numbersOnly').keyup(function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    
    $('form').submit(function(){
        $(this).find(':submit').attr('disabled','disabled');
    });
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });
  });

</script>

@section('closing')

@stop

@include('common.footer')