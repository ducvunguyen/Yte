@extends('admin.layout')

@section('content')
@if (Session::has('success'))
   <div class="alert alert-info">{{ Session::get('success') }}</div>
@endif
<p>Well come to Admin</p>
@endsection