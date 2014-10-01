@include('common.layout')


<div class="content">

{{ Form::open(array('route' => 'orders.admStore')) }}
<table border="0" id="buy_list">

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
  <?php $stt = 1; 
    $total_fee = 0;
  ?>
  <!-- { { dd($prod_orders)} } -->
  @if($prod_orders)
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
      <option value="{{ $prod->id }}" price="{{$prod->price}}" {{ ($prod->id == $p_order->product_id) ? "selected='1'" : "" }}>
        {{ $prod->name }}
      </option>
      @endforeach
    </select>
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" value="{{ $p_order->quantity }}" size="6" class="numeric" onkeyup="updateFee(this)" />
    </td>    
    <td width="15%" nowrap>
      <span class="price_cell">{{ number_format($p_order->price,0,'',' ') }}</span>
    </td> 
    <td width="15%" align="center">
      <span id="total_{{$stt}}" class="total_cell">{{ number_format($p_order->price*$p_order->quantity,0,'',' ') }}</span>
    </td>  
    <?php $total_fee += ($p_order->price*$p_order->quantity); ?>  
    <td width="15%" align="center">
      <button type="button" id="plus" name="plus" onclick="addChildRow(this)" >+</button>
      <button type="button"  id="minus" name="minus" onclick="removeChildRow(this)">-</button>
    </td>
  </tr>
  @endforeach
  @endif
  </tbody>

  <tr>
  <td colspan="4" class="steelBlue">&nbsp;</td>
  <td class="steelBlue">&nbsp;</td>
  <td class="steelBlue" id="total_fee">{{ number_format($total_fee,0,'',' ') }}</td>
  <td align="right" class="steelBlue">
      {{ Form::submit('save') }}
      {{ HTML::linkRoute('dashboard.index', 'Cancel') }}
  </td>
  </tr>
</table>

{{ Form::close() }}

</div>

<script>
    function number_format(num) {
      return num.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,')
    }

    function updateFee(fee) {
      var total = 0;

      $('.food_row').each(function() {
        var cur_prod = $(this).find('select:eq(1) option:selected').attr('price');
        // console.log(cur_prod);
        var cur_qty = $(this).find("input:text").val();
        $(this).find('span.price_cell').text(cur_prod);
        var cur_price = parseInt($(this).find('span.price_cell').html()); 
        // console.log(cur_price);
        $(this).find('span.total_cell').html(cur_qty*cur_prod); //fix me
      });
      $('.total_cell').each(function(){
        total += parseInt($.trim($(this).html().toString()));
      });
      // fix me
      $('#total_fee').text(total);
    }

    function addChildRow(cur_row) {
        var length = $('tr.food_row').length;
        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('#buy_list tr.food_row:last').find("input:text").val("");
        $('#buy_list tr.food_row:last').find("td:first").text(++length);
        $('.numeric').keyup(function () { 
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

          // $('#prod_'+row_id).html(html);
          $(row).closest('tr').find('select:eq(1)').html(html);
          updateFee();
      });
    }

  $(document).ready(function() {
    // checkLength();
    updateFee();
    
    $('.numeric').keyup(function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    

  });
</script>
