<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="{{asset('')}}">
	<title>Document</title>
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<h1>Create Post</h1>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form action="{{route('add')}}" method="POST" role="form">
		@csrf
		<legend>Add product</legend>
		<pre></pre>
		<div class="form-group">
			<label for="">Name: </label>
			<input name="name" type="text" class="form-control" id="" placeholder="Name">
		</div>
		<pre></pre>
		<div class="form-group">
			<label for="">Phone: </label>
			 <textarea name="phone" id="phonepd" rows="10" cols="80">
                
            </textarea>
            
             <script>
               CKEDITOR.replace( 'phonepd', {
			    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
			    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
			    filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
			    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			    filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			} );
            </script>
		</div>
		
		<pre></pre>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</body>
</html>