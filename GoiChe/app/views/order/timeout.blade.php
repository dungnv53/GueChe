@include('common.layout')

 <div class="content">
 <fieldset>

 <p>Hiện tại: {{ date('F j, Y, g:i A') }}  </p>
 <p>Hạn đặt chè: 
 	@if(isset($end))
 	{{ date('F j, Y, g:i A', $end) }}
 	@else 

 	@endif
 <a id="btn-back" href="{{ route('home') }}">Back Home</a>
 </fieldset>
</div>
