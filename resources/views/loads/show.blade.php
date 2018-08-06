@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">
    
    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <div method="post" action="/orders" class="card">
    @csrf
        <div type="hidden" name="companyid" value="{{$company->id}}">
            <div class="card-header bg-3 text-light text-center">
                View Order #{{$load->internal_number}}
            </div>
            <div class="card-body bg-1">
                <div class="row">
                    <div class="form-group col-md">
                        <div>Order #</div>
                        <div class="form-control" id="orderNum">
                            {{$load->internal_number}}
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <div>External Order #</div>
                        <div class="form-control" id="external">
                            @if ($load->external_number)
                                {{$load->external_number}}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div>Customer</div>
                        <div class="form-control" id="customer">
                            @if ($customer)
                                {{$customer->name}}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div>Pickup Address</div>
                        <div class="form-control" id="pickup1">
                            @if ($load->pickup_address1)
                                {{$load->pickup_address1}}
                            @else
                                None
                            @endif
                        </div>
                        <div class="form-control" id="pickup2">
                            @if ($load->pickup_address2)
                                {{$load->pickup_address2}}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <div>Dropoff Address</div>
                        <div class="form-control" id="dropoff1">
                            @if ($load->dropoff_address1)
                                {{$load->dropoff_address1}}
                            @else
                                None
                            @endif
                        </div>
                        <div class="form-control" id="dropoff2">
                            @if ($load->dropoff_address2)
                                {{$load->dropoff_address2}}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div>Agreed Rate</div>
                        <div class="form-control">
                            @if ($load->rate)
                                ${{($load->rate)/100}}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div for="description">Description</div>
                        <div class="form-control" id="description">
                            @if ($load->description)
                                {{$load->description}}
                            @elseif ($load->pickup_address2 && $load-> dropoff_address2)
                                {{$load->pickup_address2}} to {{$load->dropoff_address2}}
                                <span class="float-right">
                                    (default)
                                </span>   
                            @else
                                None                             
                            @endif
                        </div>
                    </div>
                </div>
          </div>


            <div class="card-footer bg-1">
                <a href="/orders" class="btn btn-primary">Back</a>
                <a href="/orders/{{$load->id}}/edit" class="btn btn-secondary">Edit</a>
            </div>
    </div>
</div>


@endsection