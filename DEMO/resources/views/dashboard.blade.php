@extends('layouts.app')

@section('content')

    <div class="container createFood">
        <a href="/foods/create" class="btn btn-outline-secondary my-3">Add Food TO Menu</a>
        <h1>Change Number of Seats</h1>
		<a name="forms">
			<a name="csrf-field">
				<form method='POST' action="/seats">
					@csrf
					@method('POST')
				    <div class="form-group">
				    	<label>Total Number of Seats</label>
				    	<input type="text" name="total" type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Total Number of Seats" class="form-control">
				    </div>
				    <div class="form-group">
				    	<label>Avialable Number of Seats</label>
				    	<input type="text" name="vialable" type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Avialable Number of Seats" class="form-control">
				    </div>  
				    <div class="form-group">
				    	<input type="submit" class="btn btn-primary">
					</div>
				</form>
			</a>
		</a>
		<div>
		@foreach($messages  as $msg)
		<div class="row" style="font-weight: bold;">
		        <div class="col-md-1 col-sm-1 col-xs-1">
					{{$msg->name}}
				</div>
		        <div class="col-md-3 col-sm-3 col-xs-3">
					{{$msg->phone}}
				</div>
		        <div class="col-md-3 col-sm-3 col-xs-3">
					{{$msg->email}}
				</div>
		        <div class="col-md-2 col-sm-2 col-xs-2">
					{{$msg->created_at}}
				</div>
		        <div class="col-md-1 col-sm-1 col-xs-1">
					<a name="forms">
						<a name="csrf-field">
							<form method='POST' action="/messages/{{$msg->id}}">
								@csrf
								@method('POST')
							    <div class="form-group">
							    	@php
							    		$read ="Read";
							    		if($msg->is_read){
		    								$read = "Unread";
							    		}
									@endphp
							    	<input type="submit" class="btn btn-primary" value="{{$read}}">
								</div>
							</form>
						</a>
					</a>
				</div>
		        <div class="col-md-12 col-sm-12 col-xs-12">
		        	<div class="col-md-8 col-sm-8 col-xs-8">
						{{$msg->body}}
					</div>
				</div>
				</div>
		@endforeach
		{{$messages->links()}}
	    </div>
	    <div class="mb-5 mt-5">
	    	
		@foreach($bookings  as $booking)
		<div class="row" style="font-weight: bold;">
		        <div class="col-md-2 col-sm-2 col-xs-2">
					{{$booking->user->name}}
				</div>
		        <div class="col-md-3 col-sm-3 col-xs-3">
					{{$booking->day}}
				</div>
		        <div class="col-md-3 col-sm-3 col-xs-3">
					{{$booking->time}}
				</div>
		        <div class="col-md-3 col-sm-3 col-xs-3">
					{{$booking->gnumber}}
				</div>
		        <div class="col-md-1 col-sm-1 col-xs-1">
					<a name="forms">
						<a name="csrf-field">
							<form method='POST' action="/bookings/{{$booking->id}}">
								@csrf
								@method('DELETE')
							    <div class="form-group">
							    	<input type="submit" class="btn btn-danger" value="Cancel">
								</div>
							</form>
						</a>
					</a>
				</div>
				</div>
		@endforeach
		{{$bookings->links()}}

	    </div>
    </div>
@endsection
