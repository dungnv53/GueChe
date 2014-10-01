@include('common.layout')

<div class="content">
{{ Form::open(array('route' => 'orders.admStore')) }}

  @if($errors->any())
    <ul>
      {{ implode('', $errors->all('<li>:message</li>'))}}
    </ul>
  @endif

  {{-- $ user['username'] --}}
  {{-- Hien ten day du cho user --}}
  <table border="0" id="buy_list">

  <thead><tr>
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

  <tr id="food_row" class="food_row"> 
    <td width="10%">
      <select name="category[]" onchange="drawProduct(this)">

      @foreach($categories as $cat)
      <option value="{{ $cat['id'] }}">
        {{ $cat['name'] }}
      </option>
      @endforeach

    </select>
    </td>  
    <td width="30%" nowrap>
      <select name="product[]" onchange="updateFee(this)">

      @foreach($che as $ch)
      <option value="{{ $ch['id'] }}" price="{{$ch['price']}}">
        {{ $ch['name'] }}
      </option>
      @endforeach
    </select>
        
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" size="6" class="numeric"  onkeyup="updateFee(this)" />
    </td>    
    <td width="15%" nowrap>
      <span class="price_cell" >0</span>
    </td> 
    <td width="10%" align="right">
      <span class="total">{{ 0 }}</span>
    </td>    
    <td width="20%" nowrap align="center">
      <button type="button" id="plus" name="plus" onclick="addChildRow(this)" >+</button>
      <button type="button"  id="minus" name="minus" onclick="removeChildRow(this)">-</button>
    </td>
  </tr>
 
  <tr class="tfoot">
  <td colspan="4" class="steelBlue">&nbsp</td>
  <td colspan="" class="steelBlue">&nbsp</td>
  <td colspan="2" class="steelBlue" align="center">
  <button>{{ HTML::linkRoute('dashboard.index','Cancel') }}</button>
  {{ Form::submit('Reserve') }}
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
        // var cur_price = parseInt($(this).find('span.price_cell').html());
        // console.log(cur_price);
        $(this).find('span.total').html(cur_qty*cur_prod); //fix me
      });
      $('.total').each(function(){
        total += parseInt($.trim($(this).html().toString()));
      });
      // fix me
      $('#total_cell').text(total);
    }

    function addChildRow(cur_row) {
        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('.numbersOnly').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        // drawProduct($(new_row).find('select:first').val());
        checkLength();
        updateFee();
    }
    function removeChildRow(cur_row) {
      console.log(cur_row.parent());
       $('#buy_list tr.food_row:last').not('tr.food_row:first').remove();
       checkLength();
       updateFee();
    }

    function drawProduct(row) {
      $.post('{{ route("products.getList" ) }}', {'cat_id': row.value, '_method': 'POST' }, function(data, msg) {
          // console.log(data);
          var products = data;
          var html = '';
          for(var i = 0; i < products.length; i++){
            var product = products[i];
            html += '<option value='+product.id+' price='+product.price+' cat_id='+product.cat_id+'>'+product.name+'</option>';
          }

          // console.log($(row).closest('tr'));
          $(row).closest('tr').find('select:eq(1)').html(html);
          updateFee();
      
      });
    }
      
    function checkLength() {
      length = $('tr.food_row').length;
      if(length < 2) {
        return false;
      }
      return length;
    }
    
  $(document).ready(function() {
    checkLength();
    updateFee();
    drawProduct($('.food_row:first').find('select:first').val());

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });
  });
</script>