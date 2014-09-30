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
	<th width="15%">
		Tên
	</th>
	<th width="10%">
		Loại
	</th>
  <th width="20%">
    Đồ ăn
  </th>	
  <th width="1%" nowrap>
		&nbsp;
	</th>
	<th width="5%" nowrap>
		Số lượng
	</th>
	<th width="10%">
		Giá
	</th>
	<th width="10%">
		Tổng 
	</th>
	<th width="15%">
		Thao tác
	</th>
  </tr></thead>

  <tbody>
  <?php $stt = 1; 
    $total_fee = 0;
  ?>
  @foreach($users as $user)
  <tr id="row_{{ $user['id'] }}">
  	<td width="1%" border="0">
	    {{ $stt++ }}
    </td> 
    <td width="10%">
	    {{ $user['fullname'] }}
    </td>  
    <td width="10%" id="cat_row_{{$user['id']}}">
    	@if(($user->getCurOrder()))
    	@if($user->getCurOrder()->getProdOrder())
    	  @foreach($user->getCurOrder()->getProdOrder() as $prod_order) 
    	  <?php $product = $prod_order->getProduct() ?>
    	  	<select id="cat_{{$user['id']}}" name="cat_{{$user['id']}}[]" onchange="drawProduct(this)">

  		    @foreach($categories as $cat)
  			    <option value="{{ $cat['id'] }}" {{ ($product[0]['cat_id'] == $cat['id']) ? "selected='1'" : ""; }}>
  			    	{{ $cat['name'] }}
  			    </option>
  			  @endforeach
			    </select>
		  	  <br />
		    @endforeach

        <!-- Order exist but no product order -->
        @else
          <select id="cat_{{$user['id']}}" name="cat_{{$user['id']}}[]" onchange="drawProduct(this)">

          @foreach($categories as $cat)
          <option value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected='1'" : ""; }}>
            {{ $cat['name'] }}
          </option>
          @endforeach

          </select>
        @endif

    	@else
	    <select id="cat_{{$user['id']}}" name="cat_{{$user['id']}}[]" onchange="drawProduct(this)">

	    @foreach($categories as $cat)
	    <option value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected='1'" : ""; }}>
	    	{{ $cat['name'] }}
	    </option>
	    @endforeach

		  </select>

		@endif


    </td>  
    <td width="30%" nowrap>

      @if($user->getCurOrder())
       @if($user->getCurOrder()->getProdOrder())

       @foreach($user->getCurOrder()->getProdOrder() as $prod_order) 

        <?php $list = $prod_order->getListProduct();
         ?>
          <select id="product_{{$user['id']}}" name="product_{{$user['id']}}[]" >

          @foreach($list as $prod)
            <option value="{{ $prod['id'] }}" {{ ($prod_order->product_id == $prod->id) ? "selected=" : ""; }}>
              {{ $prod->name }}
            </option>
          @endforeach
          </select>
          <br />
        @endforeach
        @else  <!-- Empty product order -->
          <select>

          @foreach($che as $ch)
          <option name="product_{{ $user['id'] }}" value="{{ $ch['id'] }}">
            {{ $ch['name'] }}
          </option>
          @endforeach
          </select>
        @endif
      @else   <!-- normal form -->
	    <select>

	    @foreach($che as $ch)
	    <option name="product_{{ $user['id'] }}" value="{{ $ch['id'] }}">
	    	{{ $ch['name'] }}
	    </option>
	    @endforeach
		  </select>
      @endif
	    	
    </td>
    <td width="1%" align="center" nowrap>
	      <button type="button" id="plus" name="plus_{{$user['id']}}" class="btn_add" >+</button>
      	<button type="button"  id="minus" name="minus_{{$user['id']}}" onclick="removeChildRow(this)">-</button>
    </td>    
    <td width="5%" align="center" id="qty_row_{{$user['id']}}" nowrap>
      @if($user->getCurOrder())
       @if($user->getCurOrder()->getProdOrder())
       @foreach($user->getCurOrder()->getProdOrder() as $prod_order) 
          <input type="text" name="quantity_{{ $user['id'] }}[]" size="6" value="{{$prod_order->quantity}}" class="qty_row" />    
          <br />
        @endforeach

        @else
          <input type="text" name="quantity_{{ $user['id'] }}[]" size="6" class="qty_row" />
        @endif
      @else   <!-- normal form -->
	    <input type="text" name="quantity_{{ $user['id'] }}[]" size="6" class="qty_row" />
      @endif
    </td>    
    <td width="15%" nowrap>
      @if($user->getCurOrder())
       @if($user->getCurOrder()->getProdOrder())
       <?php $total_row = 0; ?>
       @foreach($user->getCurOrder()->getProdOrder() as $prod_order) 
          <?php $total_row += $prod_order->getProduct()[0]['price']*$prod_order->quantity;
                $total_fee += $prod_order->getProduct()[0]['price']*$prod_order->quantity; //$total_row;
           ?>
          {{number_format($prod_order->getProduct()[0]['price']*$prod_order->quantity,0,'',' ')}}
          <br />
        @endforeach

        @else
          0
        @endif
      @else   <!-- normal form -->
        0
      @endif
    </td> 
    <td width="10%">
      @if($user->getCurOrder())
        @if(isset($total_row))
  	    {{ number_format($total_row,0,'',' ') }}

        @else
          0
        @endif
      @else
      0
      @endif
    </td>    
    <td width="20%" nowrap align="center">
	    <!-- { { Form::button('save') } } -->
      @if($user->getCurOrder())
	    {{ HTML::linkRoute('orders.admEdit','Edit', $user->getCurOrder()->id) }}
      @else
      {{ HTML::linkRoute('orders.admCreate','Order', $user->id) }}
      @endif
    </td>
  </tr>
  @endforeach
  </tbody>

  <tr>
  	<td colspan="8" style="background: #FFFFFF">&nbsp;</td>
  </tr>

  <tr>
  <td colspan="5" class="seaGreen">&nbsp;</td>
  <td class="seaGreen" colspan="2">
    {{ HTML::linkRoute('report', 'Report') }}
  </td>
  <td class="seaGreen" id="allFee" nowrap>{{number_format($total_fee,0,'',' ')}}</td>
  <td colspan="" align="right" class="seaGreen">
	    {{ Form::button('stopReserve') }}
  </td>
</tr>

{{ Form::close() }}
</table>

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

    function drawProduct(row) {
    	console.log(row);
    }

    function getListProduct(cat_id) {
    	// $('').click(function() {
    	// });
		console.log(cat_id);
    	$.post('{{ route("products.getList" ) }}', {'cat_id': cat_id, '_method': 'POST' }, function(data, msg) {
			// console.log(data);
			
    	});
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