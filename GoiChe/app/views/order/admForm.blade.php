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
      <select name="category[]">

      @foreach($categories as $cat)
      <option value="{{ $cat['id'] }}" {{ ($cat['name'] == 'Chè') ? "selected=" : ""; }}>
        {{ $cat['name'] }}
      </option>
      @endforeach

    </select>
    </td>  
    <td width="30%" nowrap>
      <select name="product[]">

      @foreach($che as $ch)
      <option value="{{ $ch['id'] }}">
        {{ $ch['name'] }}
      </option>
      @endforeach
    </select>
        
    </td>    
    <td width="5%" align="center">
      <input type="text" name="quantity[]" size="6" class="numberOnly" />
    </td>    
    <td width="15%" nowrap>
      {{ number_format($che[0]['price'],0,'',' ') }}
    </td> 
    <td width="10%" align="right">
      {{ 0 }}
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

{{ Form::close() }}

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
      // var
      // khai bao cac bien food, quatity
      // check  isNaN
      // loop tinh tong
      // update view

    }

    function addChildRow(cur_row) {
        var new_row = '<tr class="food_row">' + $('#food_row').html() + '</tr>';
        $('#buy_list tr.food_row:last').after(new_row);
        $('.numbersOnly').keyup(function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        checkLength();
        updateFee();
    }
    function removeChildRow(cur_row) {
      console.log(cur_row.parent());
       $('#buy_list tr.food_row:last').not('tr.food_row:first').remove();
       checkLength();
       updateFee();
    }

    function minus(id) {
        var value = $('#input_number_rental_'+id).val();
        if (value <= 0) return;
        
        value--;
        if (value == 0) {
          $('#checkbox_'+id).attr('checked', false);
        }
        $('#input_number_rental_'+id).val(value);
        $('#number_rental_'+id).html(number_format(value));
        updateFee();
     }
      
     function plus(id) {
        var value = $('#input_number_rental_'+id).val();
        // if (value <= 1) return;
        
        value++;
        $('#checkbox_'+id).attr('checked', true);
        $('#input_number_rental_'+id).val(value);
        $('#number_rental_'+id).html(number_format(value));
        updateFee();
     }
      
    function checkLength() {
      var length = $('#service_list tr:last').index(); 
      if(parseInt(length) <= 0) 
           $('#minus_service').attr('disabled', 'true');
      else $('#minus_service').removeAttr('disabled');
        if((length+2) > <?php echo count($categories)?>) 
             $('#plus_service').attr('disabled', 'true');
        else $('#plus_service').removeAttr('disabled');
    }
  function calc_rental() {
    updateFee();
  }

    
  $(document).ready(function() {
    checkLength();
    updateFee();
    
    $('.numbersOnly').keyup(function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('.numbersChild').keyup(function () { 
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