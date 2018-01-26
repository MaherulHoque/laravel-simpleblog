@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Create Post <a href="{{route('posts.index')}}" class="btn btn-primary pull-right">Back</a></h1>
				@if(count($errors->all())>0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
				@endif

				<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="post_category_id">Category</label>
						<select name="post_category_id" id="post_category_id" required="required">
							<option value="">Select Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->category_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="image">Select Image</label>
						<input type="file" name="image" id="image" required="required">
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<button class="btn btn-success">Create</button>
				</form>
			</div>
		</div>
	</div>
@endsection