@extends('admin.layout')

@section('content')
	<a class="btn btn-info" href="{{route('admin.package.showPackage')}}">Quay lại</a>
	<pre></pre>
	 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
      @endif
      
            <pre></pre>
	<form action="{{route('admin.package.update', $data->id)}}" method="POST" role="form">
		<legend>Thêm gói sản phẩm</legend>
		@csrf
		<div class="form-group">
			<label for="namePd">Tên gói sản phẩm: </label>
			<input name="name" type="text" class="form-control" id="namePd" placeholder="Nhập tên gói sản phẩm" value="<?php echo $data->name ?>">
		</div>
		<div class="form-group">
			<label for="addressPd">Địa điểm: </label>
			<input name="address" type="text" class="form-control" id="addressPd" placeholder="Nhập địa điểm" value="<?php echo $data->address ?>">
		</div>
		<div class="form-group">
			<label for="datePd">Thời gian: </label>
			<input name="date" type="text" class="form-control" id="datePd" placeholder="Nhập thời gian" value="<?php echo $data->date ?>">
		</div>
		<div class="form-group">
			<label for="contentPd">Nội dung: </label>
			<textarea name="content" id="contentPd" name="content" class="form-control"><?php echo $data->content ?></textarea>
            <script>
      			config = {};
                config.entities_latin = false;
                config.language = 'vi';
                config.uiColor = '#AADC6E';
                config.toolbarGroups = [
				{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
				{ name: 'forms', groups: [ 'forms' ] },
				'/',
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
				{ name: 'links', groups: [ 'links' ] },
				{ name: 'insert', groups: [ 'insert' ] },
				'/',
				{ name: 'styles', groups: [ 'styles' ] },
				{ name: 'colors', groups: [ 'colors' ] },
				{ name: 'tools', groups: [ 'tools' ] },
				{ name: 'others', groups: [ 'others' ] },
				{ name: 'about', groups: [ 'about' ] }
			];

			config.removeButtons = 'Flash,Table,Smiley,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,About,Link,Unlink,Anchor,CreateDiv,Blockquote,Source,Save,NewPage,Preview,Print,Templates,ShowBlocks,EasyImageUpload';
      			CKEDITOR.replace( 'contentPd', config,
				 {
				     filebrowserBrowseUrl: '../../ckfinder/ckfinder.html',
				     filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?type=Images',
				     filebrowserUploadUrl:
				        '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
				     filebrowserImageUploadUrl:
				        '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/'
				 });
            </script>
		</div>
		
		<button type="submit" class="btn btn-primary">Thêm</button>
	</form>
@endsection