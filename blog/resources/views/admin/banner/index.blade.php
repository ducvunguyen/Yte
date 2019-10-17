@extends('admin.layout')

@section('content')
<div class="container">
	<a href="{{route('admin.banner.addBanner')}}" class="btn btn-info">Thêm banner</a>
	<pre></pre>
	@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session()->get('message') }}
	</div>
	@else
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	@endif
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Silde</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key=>$val)
				<tr>
					<td>{{$key++}}</td>
					<td>{{$val->name}}</td>
					<td><img src="uploads/banners/{{$val->image}}" style="width: 50%"> </td>
					<td><a href="{{route('admin.banner.edit', $val->id)}}">Edit</a></td>
					<td><a href="{{route('admin.banner.destroy', $val->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{$data->links()}}
</div>
@endsection()