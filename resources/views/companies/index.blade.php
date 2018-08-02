@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">Companies</h2>

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
                    <form action="/companies/{{$company->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/companies/{{$company->id}}/edit"class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button type="submit" href="#" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer bg-1">
            <a href="/companies/create" class="btn btn-success">Add New Company</a>
        </div>
    </div>

    
</div>
@endsection
