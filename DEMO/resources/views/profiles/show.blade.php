@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 my-3">
                <img src="/storage/images/{{$user->avatar}}" style="width: 100%;">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 my-3">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 my-3">
                        Name: 
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 my-3">
                        {{$user->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 my-3">
                        Phone: 
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 my-3">
                        {{$user->phone}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3 my-3">
                        Email: 
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 my-3">
                        {{$user->email}}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-3 col-xs-3 my-3">
                    <a name="forms">
                        <a name="csrf-field">
                            <form method='GET' action="/profile/edit">
                                @csrf
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>
                            </form>
                        </a>
                    </a>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 my-3">
                        <a name="forms">
                            <a name="csrf-field">
                                <form method='POST' action="/profile">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>                                  
@endsection
