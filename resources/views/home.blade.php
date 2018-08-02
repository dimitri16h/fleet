@extends('layouts.app')

@section('content')
<div class="container text-center">

    <h2 class="text-light mb-4">Welcome, {{ Auth::user()->name }}</h2>

    @if (session('status'))
        <div class="alert text-center" style=" background-color:#499356; margin:0 auto; margin-bottom: 10px;" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (count($companies) == 0) 
        TODO
        <div class="text-light">You have no companies yet</div>
    @endif

    <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card" style="border:none;">
                <div class="card-header text-light" style="background-color:#405265;">Dashboard</div>

                <div class="card-body" style="background-color:#d3d0bc;">
                    <button class="btn mb-1" style="width:100px; height:60px">Analytics</button>
                    <button class="btn mb-1" style="width:100px; height:60px">Dispatch</button>
                    <button class="btn mb-1" style="width:100px; height:60px">Vehicles</button>
                    <button class="btn mb-1" style="width:100px; height:60px">Customers</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row justify-content-center mb-2">
        <div class="col-md-12">
            <div class="card" style="border:none;">
                <div class="card-header text-light" style="background-color:#405265;">Test Area</div>

                <div class="card-body" style="background-color:#d3d0bc;">

                    {{$companies}}
                </div>
            </div>
        </div>
    </div> -->


</div>
@endsection
