@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">
    <div class="card">
        <div class="card-header text-light text-center bg-3">
            Edit Truck
        </div>

        <div class="card-body bg-1">
            <div class="text-center">
                Company: {{$truck->company()->first()->name}}
            </div>
            <form action="/trucks/{{$truck->id}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="namefield">Name</label>
                    <input type="text" class="form-control" id="namefield" name="namefield" placeholder="" value="{{$truck->name}}">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>

    
</div>
@endsection
