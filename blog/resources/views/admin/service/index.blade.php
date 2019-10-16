@extends('admin.layout')

@section('content')
<div class="container">
	<a href="{{route('admin.service.addService')}}" class="btn btn-info">Thêm dịch vụ</a>
	@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session()->get('message') }}
	</div>
	@else
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	@endif
	@foreach($data as $val)
	<div class="form-group">
		<div style="display: flex; justify-content:flex-start">
			<img src="uploads/images/{{$val->icon}}">
			<h2><?php echo $val->name ?></h2>
			
		</div>
		<div class=" mgr-20 mgr-40" >
				<h4 class="h4"><?php echo $val->title ?> </h4>
				<h5 ><strong style="color: #169bd3"><?php echo $val->title_child ?> </strong></h5>

				<p><?php echo $val->content ?></p>
			</div>										
		</div>
		<a href="{{route('admin.service.edit', $val->id)}}" class="btn btn-warning">Edit</a>
		<a href="{{route('admin.service.destroy', $val->id)}}" class="btn btn-danger">Delete</a>
		<pre></pre>
		@endforeach

		{{$data->links()}}
	</div>
	@endsection()