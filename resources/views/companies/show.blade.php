@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <ul class="nav nav-tabs bg-1" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Billing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
      </li>
    </ul>
    <div class="tab-content bg-1" id="myTabContent">
      <div class="tab-pane fade show active card-body" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="form-group col-md">
                    <label for="name">Name</label>
                    <div class="form-control" id="name" name="name">{{$company->name}}</div>
                </div>
                <div class="form-group col-md">
                    <label for="phone">Phone</label>
                    <div class="form-control" id="phone" name="phone">
                        @if($company->phone)
                            {{$company->phone}}
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
                        @if($company->address1)
                            {{$company->address1}}
                        @else 
                            None
                        @endif
                    </div>
                    <div class="form-control" id="address2" name="address2">
                        @if($company->address2)
                            {{$company->address2}}
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
                        @if($company->billing_name)
                            {{$company->billing_name}}
                        @else 
                            {{$company->name}} 
                            <span class="float-right">(default)</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="billingAddress1">Address (Billing Purposes)</label>
                    <div class="form-control" id="billingAddress1" name="billingAddress1">
                        @if($company->billing_address1)
                            {{$company->billing_address1}}
                        @elseif ($company->address1)
                            {{$company->address1}}
                            <span class="float-right">(default)</span>
                        @else 
                            None
                        @endif
                    </div>
                    <div class="form-control" id="billingAddress2" name="billingAddress2">
                        @if($company->billing_address2)
                            {{$company->billing_address2}}
                        @elseif ($company->address2)
                            {{$company->address2}}
                            <span class="float-right">(default)</span>
                        @else 
                            None
                        @endif
                    </div>
                </div>
            </div>
      </div>



      <div class="tab-pane fade card-body" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
                <div class="form-group col-md">
                    <label for="contactName">Contact Name</label>
                    <div class="form-control" id="contactName" name="contactName">
                        @if($company->contact_name)
                            {{$company->contact_name}}
                        @else 
                            {{$company->name}}
                            <span class="float-right">(default)</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md">
                    <label for="contactPhone">Contact Phone</label>
                    <div class="form-control" id="contactPhone" name="contactPhone">
                        @if($company->contact_phone)
                            {{$company->contact_phone}}
                        @elseif ($company->phone)
                            {{$company->phone}}
                            <span class="float-right">(default)</span>
                        @else
                            None
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="contactEmail">Contact Email</label>
                    <div class="form-control" id="contactEmail" name="contactEmail">
                        @if($company->contact_email)
                            {{$company->contact_email}}
                        @else 
                            None
                        @endif
                    </div>
                </div>
            </div>
      </div>


      <div class="card-footer bg-1">
            <a href="/companies" class="btn btn-primary">Back</a>
            <a href="/companies/{{$company->id}}/edit" class="btn btn-secondary">Edit</a>
        </div>
    </div>
    
</div>
@endsection
