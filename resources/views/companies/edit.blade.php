@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <div class="card">
        <div class="card-header text-light text-center bg-3">
            Edit
        </div>

        <div class="card-body bg-1">
            <form action="/companies/{{$company->id}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="namefield">Name</label>
                    <input type="text" class="form-control" id="namefield" name="namefield" placeholder="" value="{{$company->name}}">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>

    
</div>
@endsection
