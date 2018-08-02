@extends('layouts.app')

@section('content')

<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <div class="card">
        <div class="card-header text-light text-center bg-3">
            Add New Customer
        </div>

        <div class="card-body bg-1">
            <form action="/customers" method="POST">
                <input type="hidden" name="companyid" value="{{$company->id}}">
                <div class="form-group">
                    <label for="namefield">Customer Name</label>
                    <input type="text" class="form-control" id="namefield" name="namefield">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>
    </div>
@endsection
