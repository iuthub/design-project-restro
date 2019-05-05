@extends('layouts.app')
@section('content')
	<h1>Add Food to Menu</h1>
	<a name="forms">
		<a name="csrf-field">
			<form method='POST' action="/foods/{{$food->id}}" enctype="multipart/form-data">
				@csrf
				<!-- @method('POST') -->
			    <div class="form-group">
			    	<label>Name</label>
			    	<input type="text" name="name" placeholder="Name" class="form-control" value="{{$food->name}}">
			    </div> 
			    <div class="form-group">
			    	<label>Nationality</label>
			    	<input type="text" name="nationality" placeholder="Nationality" class="form-control"value="{{$food->nationality}}">
			    </div>
			    
			    <div class="form-group">
			    	<label>Type</label>
			    	<select name="type">
			    		<option value="food" @if($food->type == 'food')selected@endif>Food</option>
			    		<option value="salad" @if($food->type == 'salad')selected@endif>Salad</option>
			    		<option value="snack" @if($food->type == 'snack')selected@endif>Snack</option>
			    		<option value="dessert" @if($food->type == 'dessert')selected@endif>Dessert</option>
			    	</select>
			    </div>

			    <div class="form-group">
			    	<label>Ingredients</label>
			    	<textarea name="ingredients" placeholder="Ingredients">
			    		value="{{$food->ingredients}}"
			    	</textarea>
			    </div>
				
				<div class="form-group">
			    	<label>Price</label>
					<input type="text" name="price" placeholder="Price" value="{{$food->price}}">
			    </div>

			    <div class="form-group">
			    	<label>Image</label>
				    <input type="file" name="image" >
				</div>
			    <div class="form-group">
			    	<input type="submit" class="btn btn-primary">
				</div>
			</form>
		</a>
	</a>
@endsection