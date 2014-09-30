@include('common.layout')
{{ HTML::style('/css/bootstrap-datetimepicker.min.css') }}
  {{ HTML::style('css/bootstrap-responsive.css') }}
  {{ HTML::style('/css/bootstrap.css') }}
  {{ HTML::script('/js/bootstrap-datetimepicker.min.js') }}
  {{ HTML::script('/js/bootstrap-datetimepicker.pt-BR.js') }}
<div class="content">
{{-- Form::open(array('route'=>'session.update', 'method' => 'POST')) --}}
{{ Form::open(['route' => ['session.update1',$session->id]]) }}
  <div class="well">
  {{ Form::label('date', 'Date:') }}
    <div id="datetimepicker" class="input-append">
      <input data-format="yyyy-MM-dd" type="text" name="date" value = {{Input::old('date',$session->date)}}></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
          {{-- HTML::image('img/date.jpeg')--}}
        </i>
      </span>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker').datetimepicker({
        pickTime: false
      });
    });
  </script>

  <div class="well">
  {{ Form::label('start', 'Start time:') }}
    <div id="datetimepicker1" class="input-append">
      <input data-format="hh:mm:ss" type="text" name='start' value={{ Input::old('start', $session->start) }}></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
        </i>
      </span>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker1').datetimepicker({
        pickDate: false
      });
    });
  </script>

  <div class="well">
  {{ Form::label('end', 'End time:') }}
    <div id="datetimepicker2" class="input-append">
      <input data-format="hh:mm:ss" type="text" name="end" value={{ Input::old('end', $session->end) }}></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
        </i>
      </span>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('#datetimepicker2').datetimepicker({
        pickDate: false
      });
    });
  </script>

{{ Form::submit('Update') }}
{{ Form::close() }}
</div>