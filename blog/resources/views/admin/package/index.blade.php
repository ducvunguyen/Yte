@extends('admin.layout')

@section('content')
	<a class="btn btn-info" href="{{route('admin.package.showAddPackage')}}">Thêm gói sản phẩm</a>
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
				<th>Giói sản phẩm</th>
				<th>Địa điểm</th>
				<th>Thời gian</th>
				<th>Nội dung</th>
				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key=>$val)
				<tr>
					<td><?php echo $key++ ?></td>
					<td><?php echo $val->name ?></td>
					<td style="width: 10%"><?php echo $val->address ?></td>
					<td style="width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 20px;
    -webkit-line-clamp: 5;
    display: -webkit-box;
    -webkit-box-orient: vertical;"><?php echo $val->content ?></td>
					<td><?php echo $val->date ?></td>
					<td><a href="{{route('admin.package.detailPackage', $val->id)}}" class="btn btn-info">View</a></td>
					<td><a class="btn btn-warning" href="{{route('admin.package.ShowEditPackage', $val->id)}}">Edit</a></td>
					<td><a class="btn btn-danger" href="{{route('admin.package.destroy', $val->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection