@include('common.layout')

<div class="content">
<p>Thời gian đặt chè ngày 
  @if(isset($session->date))
  {{$session->date}} : Từ {{ $session->start }} đến {{ $session->end }}
  @endif
</p>


<table border="0" id="buy_list">
{{ Form::open(array('route' => 'orders.store')) }}

  @if(isset($id))
  {{ Form::hidden('order_id', $id) }}
  @endif

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
  <?php $stt = 0; ?>
  @foreach($prod_orders as $order)
  <tr id="food_row" class="food_row">
    <td width="1%" border="0">
      {{ ++$stt }}
    </td> 
    <td width="10%">
      <select id="cat_{{$order->id}}" name="category[]" onchange="drawProduct(this, {{$order->id}})">

      @foreach($categories as $cat)
      <option value="{{ $cat->id }}" {{ ($cat->id == $order->getCategory()->id) ? "selected='1'" : ""; }}>
        {{ $cat->name }}
      </option>
      @endforeach

    </select>
    </td>
    @if(isset($order->id))
    <?php $list = $order->getListProduct(); ?>
    @endif
    <td width="30%" nowrap>
      <select id="prod_{{$order->id}}" name="product[]" onchange="updateFee()">

      @foreach($list as $ch)
      <option value="{{ $ch->id }}" price="{{$ch->price}}" {{ ($order->product_id == $ch->id) ? "selected='1'" : ""}}>
        {{ $ch->name }}
      </option>
      @endforeach
    </select>
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" value="{{ $order->quantity }}" size="6" class="numeric" onkeyup="updatePrice(this)" />
    </td>    
    <td width="15%" nowrap>
      <span class="price_cell">{{ number_format($order->price,0,'',' ') }}</span>
    </td> 
    <td width="15%" align="center">
      <span id="total_{{$stt}}" class="total">{{ number_format($order->price*$order->quantity,0,'',' ') }}</span>
    </td>    
    <td width="15%" align="center">
      <button type="button" id="plus" name="plus" onclick="addChildRow(this)" >+</button>
      <button type="button"  id="minus" name="minus" onclick="removeChildRow(this)">-</button>
    </td>
  </tr>
  @endforeach
  </tbody>

  <tr>
  <td colspan="4" class="steelBlue">&nbsp</td>
  <td class="steelBlue">&nbsp</td>
  <td class="steelBlue" id="total_cell">{{ number_format($order->price*$order->quantity,0,'',' ') }}</td>
  <td align="right" class="steelBlue">
      {{ Form::submit('save') }}
      {{ HTML::linkRoute('orders.index', 'Cancel') }}
  </td>
  <input name="test[]" type="text" value="test"></input>
  <input name="test[]" type="tex21t" value="test"></input>
  <input name="test[]" type="tex3t" value="test"></input>
  <input name="test[]" type="text3" value="test"></input>

{{ Form::close() }}
</table>

</div>
<script>
    function number_format(num) {
      return num.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,')
    }

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
      // alert('ou');
      var total = 0;

      $('.food_row').each(function() {
        var cur_prod = $(this).find('select:eq(1) option:selected').attr('price');
        // console.log(cur_prod);
        $(this).find('span.price_cell').text(cur_prod);
        var cur_qty = $(this).find("input:text").val();
        // var cur_price = parseInt($(this).find('span.price_cell').html());
        // console.log(cur_price);
        $(this).find('span.total').html(cur_qty*cur_prod);
      });
      $('.total').each(function(){
        total += parseInt($.trim($(this).html().toString()));
      });
      // fix me
      $('#total_cell').text(total);
    }

    function updatePrice(row) {

      var new_price = $(row).closest('tr').find('select:eq(1)').price;
      console.log(new_price);
     
      updateFee();
    }

    function addChildRow(cur_row) {
        var length = $('tr.food_row').length;
        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('#buy_list tr.food_row:last').find("input:text").val("");
        $('#buy_list tr.food_row:last').find("td:first").text(++length);
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
      $.post('{{ route("products.getList" ) }}', {'cat_id': row.value, '_method': 'POST' }, function(data, msg) {
          // console.log(data);
          var products = data;
          var html = '';
          for(var i = 0; i < products.length; i++){
            var product = products[i];
            html += '<option value='+product.id+' price='+product.price+' cat_id='+product.cat_id+'>'+product.name+'</option>';
          }

          // $('#prod_'+row_id).html(html); // clone error
          $(row).closest('tr').find('select:eq(1)').html(html);
      
      });
    }
    
  $(document).ready(function() {
    // checkLength();
    updateFee();
    
    $('.numeric').keyup(function () { 
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