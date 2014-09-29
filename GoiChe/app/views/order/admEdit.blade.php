@include('common.layout')


<div class="content">

<table border="0" id="buy_list">
{{ Form::open(array('route' => 'orders.admStore')) }}


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
  <!-- { { dd($prod_orders)} } -->
  @foreach($prod_orders as $p_order)
  <tr id="food_row" class="food_row">
    <td width="1%" border="0">
      {{ $stt++ }}
    </td> 
    <td width="10%">
      <select id="cat_{{$p_order->id}}" name="cat[]" onchange="drawProduct(this, {{$p_order->id}})">

      @foreach($categories as $cat)
      <option value="{{ $cat->id }}" {{ ($cat->id == $p_order->cat_id) ? "selected='1'" : ""; }}>
        {{ $cat->name }}
      </option>
      @endforeach

    </select>
    </td>  
    <?php $prod_list = Product::find($p_order->product_id)->getProdList(); ?>
    <td width="30%" nowrap id="product_row">
      <select id="prod_{{$p_order->id}}" name="product[]" onchange="updateFee()">
      @foreach($prod_list as $prod)
      <option value="{{ $prod->id }}" {{ ($prod->id == $p_order->product_id) ? "selected='1'" : "" }}>
        {{ $prod->name }}
      </option>
      @endforeach
    </select>
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" value="{{ $p_order->quantity }}" size="6" class="numberOnly" onkeyup="updateFee(this)" />
    </td>    
    <td width="15%" nowrap>
      <span class="price_cell">{{ number_format($p_order->price,0,'',' ') }}</span>
    </td> 
    <td width="15%" align="right">
      <span id="total_{{$stt}}" class="total">{{ number_format($p_order->price*$p_order->quantity,0,'',' ') }}</span>
    </td>    
    <td width="15%" align="center">
      <button type="button" id="plus" name="plus" onclick="addChildRow(this)" >+</button>
      <button type="button"  id="minus" name="minus" onclick="removeChildRow(this)">-</button>
    </td>
  </tr>
  @endforeach
  </tbody>

  <tr>
  <td colspan="4" class="steelBlue">&nbsp;</td>
  <td class="steelBlue">&nbsp;</td>
  <td class="steelBlue" id="total_cell">{{ number_format($order->price*$order->quantity,0,'',' ') }}</td>
  <td align="right" class="steelBlue">
      {{ Form::submit('save') }}
      {{ HTML::linkRoute('orders.index', 'Cancel') }}
  </td>

{{ Form::close() }}
</table>

</div>
<script>
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
      console.log(fee);
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
        var length = $('tr.food_row').length;
        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('#buy_list tr.food_row:last').find("input:text").val("");
        $('#buy_list tr.food_row:last').find("td:first").text(++length);
        $('.numbersOnly').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        // checkLength();
        updateFee();
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
    
    function drawProduct(row, row_id) {
      // console.log(row.value);
      // $('').click(function() {
      // });
      $.post('{{ route("products.getList" ) }}', {'cat_id': row.value, '_method': 'POST' }, function(data, msg) {
          // console.log(data);
          var products = data;
          var html = '';
          for(var i = 0; i < products.length; i++){
            var product = products[i];
            html += '<option value='+product.id+' price='+product.price+' cat_id='+product.cat_id+'>'+product.name+'</option>';
          }

          $('#prod_'+row_id).html(html);
      
      });
    }

  $(document).ready(function() {
    // checkLength();
    updateFee();
    
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