@extends('layouts.app')

@section('content')

<div class="container" style="height:80vh;">
    
    <h2 class="text-light mb-3">{{$company->name}}</h2>
    

    <form method="post" action="/orders" class="card border-primary" autocomplete="off">
    @csrf
        <input type="hidden" name="companyid" value="{{$company->id}}">

        <div class="card-header bg-3 text-center">
            <h4 class="text-light">New Order Form</h4>
        </div>
        <div class="tab-content bg-1" id="myTabContent">
          <div class="tab-pane fade show active card-body" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="form-group col-md">
                        <div for="orderNum">Order # <small> required</small></div>
                        <input class="form-control" id="orderNum" name="orderNum" placeholder="Required" autocomplete="false">
                    </div>
                    <div class="form-group col-md">
                        <div for="external">External Order #</div>
                        <input class="form-control" id="external" name="external" placeholder="Ex: Broker Order #" autocomplete="false">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div for="customer">Customer</div>
                        <select class="form-control" id="customer" name="customer">
                            <option>Select from Current...</option>
                            @foreach ($company->customers()->orderBy('id')->get() as $customer)
                            <option>{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md">
                        <!-- <div for="newCustomer">New Customer</div><br/>
                        <button type="button" id="newCustomer" class="btn btn-primary">Create New Customer</button> -->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div for="pickup1">Pickup Address</div>
                        <input class="form-control" id="pickup1" name="pickup1" placeholder="Ex: 3200 Factory Ln" autocomplete="false">
                        <input class="form-control" id="pickup2" name="pickup2" placeholder="Ex: City, State, 40513" autocomplete="false">
                    </div>
                    <div class="form-group col-md">
                        <div for="dropoff1">Dropoff Address</div>
                        <input class="form-control" id="dropoff1" name="dropoff1" placeholder="Ex: 8500 Industry Rd" autocomplete="false">
                        <input class="form-control" id="dropoff2" name="dropoff2" placeholder="Ex: City, State, 90210" autocomplete="false">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div for="customer">Agreed Rate</div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" step="" class="form-control" id="rate" name="rate" placeholder="0.00" autocomplete="false">
                        </div>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
          </div>


          <div class="card-footer bg-1">
                <a href="/orders" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
