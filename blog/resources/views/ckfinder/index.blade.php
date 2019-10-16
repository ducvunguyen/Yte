<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	   @else
	   <div class="alert alert-danger">
	   	
	   </div>
	@endif
	<a href="{{route('getadd')}}">Add product</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $key => $val): ?>
				<tr>
					<td><?php echo $key++ ?></td>
					<td><?php echo $val->name ?></td>
					<td><?php echo $val->phone ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	{{$data->links()}}
</body>
</html>