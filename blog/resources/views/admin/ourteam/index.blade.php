@extends('admin.layout')

@section('content')
<div class="container">
	<a href="{{route('admin.ourteam.addOurteam')}}" class="btn btn-info">Thêm đội ngũ</a>
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
	@foreach($data as $val)
	<div class="form-group">
		<div>
			<img src="uploads/ourteams/{{$val->image}}">
			<h2><?php echo $val->name ?></h2>
			
		</div>
		<div class=" mgr-20 mgr-40" >
				<h4 class="h4"><?php echo $val->position ?> </h4>
				<p><?php echo $val->content ?></p>
			</div>										
		</div>
		<a href="{{route('admin.ourteam.edit', $val->id)}}" class="btn btn-warning">Edit</a>
		<a href="{{route('admin.ourteam.destroy', $val->id)}}" class="btn btn-danger">Delete</a>
		<pre></pre>
		@endforeach

		{{$data->links()}}
	</div>
	@endsection()