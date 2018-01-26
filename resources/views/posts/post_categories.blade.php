@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>All Categories <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Create Category</a></h1>
				<div class="row">
					<div class="col-sm-12">
						@if(count($errors->all())>0)
						<div class="alert alert-danger">
							<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
							</ul>
						</div>
						@endif
						<div class="post-categories">
							<div class="btn-group" role="group" aria-label="...">
								@foreach($post_categories as $post_category)
									<a href="{{route('postcategories.show', $post_category->id)}}"><button type="button" class="btn btn-default">{{$post_category->category_name}}</button></a>
								@endforeach
							</div>
						</div>
					</div>
				</div>				
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Create Category</h4>
							</div>
							<div class="modal-body">
								<form action="{{route('postcategories.store')}}" method="POST">
									{{csrf_field()}}
								<div class="form-group">
									<label for="category_name">Name</label>
									<input type="text" name="category_name" id="category_name" class="form-control" required="required">
								</div>
								<div class="form-group">
									<label for="slug">Slug</label>
									<input type="text" name="slug" id="slug" class="form-control" required="required">
								</div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control" required="required"></textarea>
								</div>
								<button class="btn btn-primary">Create</button>				
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
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
							<td><img src="{{asset($post->image)}}" alt="" class="img-responsive"></td>
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
			</div>
		</div>
	</div>
@endsection