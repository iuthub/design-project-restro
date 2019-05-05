@extends('layouts.app')
@section('content')
<br>
	<div class="container" style="top: 80px; position:relative">	
		<h2>Add Food to Menu</h2>
		<a name="forms">
			<a name="csrf-field">
				<form method='POST' action="/foods" enctype="multipart/form-data">
					@csrf
					<!-- @method('POST') -->
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" placeholder="Name" class="form-control">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Nationality</label>
								<input type="text" name="nationality" placeholder="Nationality" class="form-control">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Type</label>
								<select name="type" class="form-control">
									<option value="food">Food</option>
									<option value="salad">Salad</option>
									<option value="snack">Snack</option>
									<option value="dessert">Dessert</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Ingredients</label>
								<textarea id="message" name="ingredients" class="form-control" placeholder="Ingredients"></textarea>
								</textarea>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Price</label>
								<input class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" name="price" placeholder="Price">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Image</label>
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="customFile" name="image">
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<!-- <div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control" name="image" >
							</div> -->
						</div>
					</div>
					

						<div class="form-group">
							<input type="submit" class="btn btn-primary">
					</div>
				</form>
			</a>
		</a>
	</div>
	<script>
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>
@endsection