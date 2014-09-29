@include('common.layout')
<div class="content">
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Category_id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Đơn vị tính</th>
			<th>Edit</th>
			<td>Delete</td>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->cat_id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->price }}</td>
				<td>{{ $product->unit }}</td>
				<td>{{ HTML::linkRoute('products.edit','Edit', $product->id) }}</td>
				<td>{{ HTML::linkRoute('products.delete','Delete',$product->id) }}</td>
			</tr>
			
		@endforeach
	</tbody>
</table>
{{$products->links()}}