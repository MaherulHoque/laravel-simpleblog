@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Edit Post <a href="{{route('posts.index')}}" class="btn btn-primary pull-right">Back</a></h1>
				@if(count($errors->all())>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
				@endif
				<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
					{{method_field('PUT')}}
					{{csrf_field()}}
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="category_id">Category</label>
								<select name="category_id" id="category_id" required="required">
									@foreach($categories as $category)
									<option value="{{$category->id}}" 
										@if($category->id == $post->post_category_id) selected @endif
										>{{$category->category_name}}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group">
								<label for="image">Select Image</label>
								<input type="file" name="image" id="image">
							</div>
						</div>
						<div class="col-sm-6">
							<img src="{{asset($post->image)}}" alt="" height="150">
						</div>
					</div>					
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" required="required"> 
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
					</div>
					<button class="btn btn-success">Update</button>
				</form>
			</div>
		</div>
	</div>
@endsection