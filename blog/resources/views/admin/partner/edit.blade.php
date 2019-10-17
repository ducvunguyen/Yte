@extends('admin.layout')

@section('content')
<a href="{{route('admin.partner.dashboard')}}" class="btn btn-info">Quay lại</a>
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
<form action="{{route('admin.partner.update', $data->id)}}" method="POST" role="form"  enctype="multipart/form-data">
    <legend>Chỉnh sửa menu </legend>
    @csrf
    <div class="form-group">
        <label for="">Tên đối tác </label>
        <input type="text" class="form-control" id="" placeholder="Tiêu đề lớn"  name="title" value="<?php echo $data->title ?>">
    </div>
    <div class="form-group">
        <label for="imagePd">Image</label>
        <input type="file" name="image" id="imagePd" class="form-control" ><?php echo $data->image ?>
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