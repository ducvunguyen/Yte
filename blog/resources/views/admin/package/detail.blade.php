@extends('admin.layout')

@section('content')
	<a class="btn btn-info" href="{{route('admin.package.showPackage')}}">Quay lại</a>
	<pre></pre>
	<legend>Chi tiết gói sản phẩm</legend>
	
		<div class="form-group">
			<label for="">Gói sản phẩm: </label>
			<div class="form-group"><?php echo $data->name ?></div>
		</div>
		<div class="form-group">
			<label for="">Địa điểm: </label>
			<div class="form-group"><?php echo $data->address ?></div>
		</div>
		<div class="form-group">
			<label for="">Thời gian: </label>
			<div class="form-group"><?php echo $data->date ?></div>	
		</div>
		<div class="form-group">
			<label for="">Nội dung: </label>
			<div><?php echo $data->content ?></div>
		</div>
@endsection