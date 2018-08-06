@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$customer->company()->first()->name}}</h2>
    <h4 class="text-light mb-3">Customer: {{$customer->name}}</h4>

    <ul class="nav nav-tabs bg-1" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Billing</a>
      </li>
    </ul>
    <div class="tab-content bg-1" id="myTabContent">
      <div class="tab-pane fade show active card-body" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="form-group col-md">
                    <label for="name">Name <small> required</small></label>
                    <div class="form-control" id="name" name="name">
                        {{$customer->name}}
                    </div>
                </div>
                <div class="form-group col-md">
                    <label for="phone">Phone</label>
                    <div class="form-control" id="phone" name="phone">
                        @if ($customer->phone)
                            {{$customer->phone}}
                        @else 
                            None
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="address1">Address</label>
                    <div class="form-control" id="address1" name="address1">
                        @if ($customer->address1)
                            {{$customer->address1}}
                        @else 
                            None
                        @endif
                    </div>
                    <div class="form-control" id="address2" name="address2">
                        @if ($customer->address2)
                            {{$customer->address2}}
                        @else 
                            None
                        @endif
                    </div>
                </div>
            </div>
      </div>



      <div class="tab-pane fade card-body" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row">
                <div class="form-group col-md">
                    <label for="billingName">Name (Billing Purposes)</label>
                    <div class="form-control" id="billingName" name="billingName">
                        @if ($customer->billing_name)
                            {{$customer->billing_name}}
                        @elseif($customer->name)
                            {{$customer->name}}
                            <span class="float-right">(default)</span>
                        @else
                            None
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="billingAddress1">Address (Billing Purposes)</label>
                    <div class="form-control" id="billingAddress1" name="billingAddress1">
                        @if ($customer->billing_address1)
                            {{$customer->billing_address1}}
                        @elseif($customer->address1)
                            {{$customer->address1}}
                        @else
                            None
                        @endif
                    </div>
                    <div class="form-control" id="billingAddress2" name="billingAddress2">
                        @if ($customer->billing_address2)
                            {{$customer->billing_address2}}
                        @elseif($customer->address2)
                            {{$customer->address2}}
                        @else
                            None
                        @endif
                    </div>
                </div>
            </div>
      </div>


      <div class="card-footer bg-1">
            <a href="/customers" class="btn btn-primary">Back</a>
            <a href="/customers/{{$customer->id}}/edit" class="btn btn-secondary">Edit</a>
        </div>
    </div>
    
</div>
@endsection
