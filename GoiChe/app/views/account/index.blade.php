@include('common.layout')
<div class="content">
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th width="200px">Username</th>
			<th width="300px">Email</th>
			<th>Role</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->role_id }}</td>
				<td>{{ HTML::linkRoute('accounts.edit','Edit',$user->id) }}</td>
				<td>{{ HTML::linkRoute('accounts.destroy','Delete',$user->id) }}</td>

			</tr>
		@endforeach
	</tbody>
</table>

{{ $users->links() }}

</div>

