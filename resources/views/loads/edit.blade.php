@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">
    
    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <form method="post" action="/orders" class="card">
    @csrf
        <input type="hidden" name="companyid" value="{{$company->id}}">
            <div class="card-header bg-3 text-light text-center">
                Edit Order
            </div>
            <div class="card-body bg-1">
                <div class="row">
                    <div class="form-group col-md">
                        <label for="orderNum">Order # <small> required</small></label>
                        <input class="form-control" id="orderNum" name="orderNum" placeholder="Required" value="{{$load->internal_number}}">
                    </div>
                    <div class="form-group col-md">
                        <label for="external">External Order #</label>
                        <input class="form-control" id="external" name="external" placeholder="Ex: Broker Order #" value="{{$load->external_number}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="customer">Customer</label>
                        <select class="form-control" id="customer" name="customer">
                            <option>{{$customerName}}</option>
                            @foreach ($company->customers()->orderBy('id')->get() as $customer)
                                @if ($customer->name != $customerName)
                                <option>{{$customer->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="pickupAddress1">Pickup Address</label>
                        <input class="form-control" id="pickup1" name="pickup1" placeholder="Ex: 3200 Factory Ln" value="{{$load->pickup_address1}}">
                        <input class="form-control" id="pickup2" name="pickup2" placeholder="Ex: 40513, City, State" value="{{$load->pickup_address2}}">
                    </div>
                    <div class="form-group col-md">
                        <label for="dropoff1">Dropoff Address</label>
                        <input class="form-control" id="dropoff1" name="dropoff1" placeholder="Ex: 8500 Industry Rd" value="{{$load->dropoff_address1}}">
                        <input class="form-control" id="dropoff2" name="dropoff2" placeholder="Ex: 90210, City, State" value="{{$load->dropoff_address2}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="customer">Agreed Rate</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" step="" class="form-control" id="rate" name="rate" placeholder="0.00" value="{{$load->rate}}">
                        </div>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="description">Description</label>
                        <input class="form-control" id="description" name="description" placeholder="Short Description for Invoice" value="{{$load->description}}">
                    </div>
                </div>
          </div>


            <div class="card-footer bg-1">
                <a href="/orders" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
    </form>
</div>
@endsection
