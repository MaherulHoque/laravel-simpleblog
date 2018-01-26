@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>All Posts 					
					<a href="{{route('posts.create')}}" class="btn btn-primary pull-right">Create Post</a>
				</h1>
				@if(session('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
				@endif
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<td>SL</td>
							<td>Title</td>
							<td>Description</td>
							<td>Category</td>
							<td>Image</td>
							<td>Author</td>
							<td>Publication Date</td>
							<td style="width: 150px;">Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->description}}</td>
							<td>{{$post->post_category->category_name}}</td>
							<td><img src="{{$post->image}}" alt="" class="img-responsive"></td>
							<td>{{$post->user->name}}</td>
							<td>{{$post->created_at->toFormattedDateString()}}</td>
							<td>
								<a class="btn btn-primary btn-sm" href="{{route('posts.edit', $post->id)}}">Edit</a>
								<a class="btn btn-warning btn-sm" href="{{route('posts.show', $post->id)}}">Show</a>
								<form action="{{route('posts.destroy', $post->id)}}" method="POST">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<input type="submit" class="btn btn-danger btn-sm" value="Delete">		
								</form>									
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<ul class="pagination">
					<li>{{$posts->links()}}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection