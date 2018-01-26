@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Post Details : <a href="{{route('posts.index')}}" class="btn btn-primary pull-right">Back</a></h1><br/>
				<h3>Post Title : {{$post->title}}</h3>
				<p>Category : {{$post->post_category->category_name}}</p>
				<p><img src="{{asset($post->image)}}" alt="" height="150"></p>
				<p>Description : {{$post->description}}</p>

			</div>
		</div>
	</div>
@endsection