@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">Dispatch</h2>
@foreach ($userCompanies as $company)
    <div class="card mb-2">
        <div class="card-header text-light text-center bg-3">
            <h4>{{$company->name}}</h4>
        </div>

        <div class="card-body bg-1">
            <div class="row">
                @if (count($company->loads) > 0)
                    @foreach ($company->loads as $load)
                    <div class="col-sm-5 col-md-2 col-lg-2">
                        Load #{{$load->internal_number}}
                    </div>
                    <!-- <div class="col-sm-5 col-md-6 col-lg-2 mb-1">
                        
                    </div> -->
                    <div class="col-sm-5 col-md-4 col-lg-2 mb-1">
                        <form action="/orders/{{$load->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="/orders/{{$load->id}}"class="btn btn-sm btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/orders/{{$load->id}}/edit"class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="submit" href="#" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <a href="" class="btn btn-sm btn-warning"> Invoice
                                <i class="fas fa-print"></i>
                            </a>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card-footer bg-1">
            <form action="/orders/create" method="get">
                <input type="hidden" name="companyid" value="{{$company->id}}">
                <button type="submit" class="btn btn-success">
                    Add New Order
                </button>
            </form>
        </div>
    </div>
@endforeach


    
</div>
@endsection
