@extends('layouts.app')

@section('content')


<!--     <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->


<h1 class="text-center text-light mb-5" style="margin-top: 40px;">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    Dashboard
    <!-- Welcome, {{ Auth::user()->name }} -->
</h1>








<div class="container" style="font-size: 1.2em; margin-top: 40px;">
    <div>
        <form>
            <div class="form-group">
                <label>Organization</label>
                <select style="height:30px;" class="form-control" id="exampleFormControlSelect1">
                  <option>Expedit Direct</option>
                  <option>Truckin.com</option>
                  <option>Haulers</option>
                  <option style="font-weight: bold;">Add New</option>
                </select>
            </div>
    </div>

    <div class="tab-content bg-light text-center" id="myTabContent">

        <div class="tab-pane active show p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light" href="">
                    <img src="{{ asset('img/graph.png') }}"></img>
                    <div>Analytics</div>
                </a>
            </span>
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light" href="/dispatch">
                    <img src="{{ asset('img/greenlight.png') }}"></img>
                    <div>Dispatch</div>
                </a>
            </span>
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light">
                    <img src="{{ asset('img/truck.png') }}"></img>
                    <div>Vehicles</div>
                </a>
            </span>
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light">
                    <img src="{{ asset('img/group.png') }}"></img>
                    <div>Customers</div>
                </a>
            </span>
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light">
                    <img src="{{ asset('img/settings.png') }}"></img>
                    <div>Manage</div>
                </a>
            </span>
            <span>
                <a class="btn-secondary text-center p-4 m-2 btn text-light disabled">
                    <img src="{{ asset('img/settings.png') }}"></img>
                    <div>Manage</div>
                </a>
            </span>
        </div>
    </div>















    
</div>
@endsection
