@extends('admin.layout')

@section('content')
<a href="{{route('admin.banner.dashboard')}}" class="btn btn-info">Quay lại</a>
<pre></pre>
<div class="row">
	<div class="col-lg-12">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
	@if (Session::has('fail'))
   		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif
</div>
<form action="{{route('admin.banner.add')}}" method="POST" role="form"  enctype="multipart/form-data">
	<legend>Thêm gói dịch vụ </legend>
	@csrf
	<div class="form-group">
		<label for="">Tên Silde </label>
		<input type="text" class="form-control" id="" placeholder="Tiêu đề lớn"  name="name">
	</div>
	<div class="form-group">
		<label for="imagePd">Image</label>
		<input type="file" name="image" id="imagePd" class="form-control" >
	</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	@endsection