@include('common.layout')
<div class = 'content'>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Date</th>
			<th>Start time</th>
			<th>End time</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($sessions as $session)
			<tr>
				<td>{{ $session->id }}</td>
				<td>{{ $session->date }}</td>
				<td>{{ $session->start }}</td>
				<td>{{ $session->end }}</td>
				<td>{{ HTML::linkRoute('session.edit','Edit', $session->id) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $sessions->links() }}

</div>