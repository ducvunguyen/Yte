@extends('admin.layout')

@section('content')
<a href="{{route('admin.service.dashboard')}}" class="btn btn-info">Quay lại</a>

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
</div>
<form action="{{route('admin.service.add')}}" method="POST" role="form"  enctype="multipart/form-data">
	<legend>Chỉnh sửa gói dịch vụ: </legend>
	@csrf
	<div class="form-group">
		<label for="">Tiêu đề lớn: </label>
		<input type="text" class="form-control" id="" placeholder="Tiêu đề lớn"  name="title_pa">
	</div>
	<div class="form-group">
		<label for="">Tiêu id: </label>
		<input type="text" class="form-control" id="" placeholder="Tiêu đề lớn"  name="title_id">
	</div>
	<div class="form-group">
		<label for="imagePd">Image Pd</label>
		<input type="file" name="image" id="imagePd" class="form-control" >
	</div>
	<div class="form-group">
		<label for="">Tiêu đề con: </label>
		<input type="text" name="title_child" class="form-control" id="" placeholder="Tiêu đề con">
	</div>
	<div class="form-group">
		<label for="slcCat">Chọn gọi trị liệu</label>
		<select  class="form-control" id="slcCat" name="package_id">
			@foreach ($package as $pack)
			<option value="{{ $pack->id }}"> {{ $pack->name }}</option>                     
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<label for="">Content</label>
		 <textarea id="contentPd" name="content" class="form-control">{!! old('content', 'editor content') !!}</textarea>
		 <script src="ckeditor/ckeditor.js"></script>
            <script>
      			config = {};
                config.entities_latin = false;
                config.language = 'vi';
                config.uiColor = '#AADC6E';

      			  CKEDITOR.replace( 'contentPd',
				 {
				     filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
				     filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
				     filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				     filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
				 		filebrowserBrowseUrl: '/browser/browse.php?type=Images',
    filebrowserUploadUrl: '/uploader/upload.php?type=Files'
				 });

            </script>
	</div>
	

		

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	@endsection