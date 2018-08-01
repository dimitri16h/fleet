@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <!-- <h2 class="text-light mb-3">Companies</h2> -->

    <div class="card">
        <div class="card-header text-light text-center bg-3">
            <h4>My Companies</h4>
        </div>

        <div class="card-body bg-1">
            @foreach ($companies as $company)
            <div class="row mb-1">
                <div class="col">
                    {{$company->name}}
                </div>
                <div class="col">
                    <a href="/companies/{{$company->id}}/edit"class="btn btn-primary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    
</div>
@endsection
