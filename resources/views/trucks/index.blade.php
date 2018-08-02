@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">Trucks</h2>
@foreach ($userCompanies as $company)
    <div class="card mb-2">
        <div class="card-header text-light text-center bg-3">
            <h4>{{$company->name}}</h4>
        </div>

        <div class="card-body bg-1">
            <div class="row">
                @if (count($company->trucks) > 0)
                    @foreach ($company->trucks as $truck)
                    <div class="col-5 col-xs-3 col-md-3 col-lg-2">
                        {{$truck->name}}
                    </div>
                    <div class="col-5 col-xs-3 col-md-3 col-lg-2 mb-1">
                        <form action="/trucks/{{$truck->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="/trucks/{{$truck->id}}/edit"class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="submit" href="#" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card-footer bg-1">
            <form action="/trucks/create" method="get">
                <input type="hidden" name="companyid" value="{{$company->id}}">
                <button type="submit" class="btn btn-success">
                    Add New Truck
                </button>
            </form>
        </div>
    </div>
@endforeach


    
</div>
@endsection
