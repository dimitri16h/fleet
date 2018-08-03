@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$company->name}}</h2>

    <!-- <div class="card">
        <div class="card-header text-light text-center bg-3">
            Basic Info
        </div>

        <div class="card-body bg-1">
            <div class="form-group">
                <label for="namefield">Name</label>
                <div class="form-control" id="namefield" name="namefield">{{$company->name}}</div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="namefield">Address</label>
                    <div class="form-control" id="namefield" name="namefield">{{$company->address1}}</div>
                    <div class="form-control" id="namefield" name="namefield">{{$company->address2}}</div>
                </div>
                <div class="form-group col-md">
                    <label for="namefield">Phone</label>
                    <div class="form-control" id="namefield" name="namefield">{{$company->phone}}</div>
                </div>
            </div>
        </div>
        <div class="card-header text-light text-center bg-3">
            Billing Info
        </div>

        <div class="card-body bg-1 collapse">
            <div class="form-group">
                <label for="namefield">Name</label>
                <div class="form-control" id="namefield" name="namefield">{{$company->name}}</div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="namefield">Address</label>
                    <div class="form-control" id="namefield" name="namefield">{{$company->address1}}</div>
                    <div class="form-control" id="namefield" name="namefield">{{$company->address2}}</div>
                </div>
                <div class="form-group col-md">
                    <label for="namefield">Phone</label>
                    <div class="form-control" id="namefield" name="namefield">{{$company->phone}}</div>
                </div>
            </div>
        </div>



        <div class="card-footer bg-1">
            <a href="/companies" class="btn btn-primary">Back</a>
            <a href="/companies/{{$company->id}}/edit" class="btn btn-secondary">Edit</a>
        </div>
    </div> -->


    <ul class="nav nav-tabs mt-5 bg-1" id="myTab" role="tablist">
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
                    <label for="namefield">Name</label>
                    <div class="form-control" id="namefield" name="namefield">{{$company->name}}</div>
                </div>
                <div class="form-group col-md">
                    <label for="namefield">Phone</label>
                    <div class="form-control" id="namefield" name="namefield">
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
                    <label for="namefield">Address</label>
                    <div class="form-control" id="namefield" name="namefield">
                        @if($company->address1)
                            {{$company->address1}}
                        @else 
                            None
                        @endif
                    </div>
                    <div class="form-control" id="namefield" name="namefield">
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
                    <label for="namefield">Name (Billing Purposes)</label>
                    <div class="form-control" id="namefield" name="namefield">
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
                    <label for="namefield">Address (Billing Purposes)</label>
                    <div class="form-control" id="namefield" name="namefield">
                        @if($company->billing_address1)
                            {{$company->billing_address1}}
                        @elseif ($company->address1)
                            {{$company->address1}}
                            <span class="float-right">(default)</span>
                        @else 
                            None
                        @endif
                    </div>
                    <div class="form-control" id="namefield" name="namefield">
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
                    <label for="namefield">Contact Name</label>
                    <div class="form-control" id="namefield" name="namefield">
                        @if($company->contact_name)
                            {{$company->contact_name}}
                        @else 
                            None
                        @endif
                    </div>
                </div>
                <div class="form-group col-md">
                    <label for="namefield">Contact Phone</label>
                    <div class="form-control" id="namefield" name="namefield">
                        @if($company->contact_phone)
                            {{$company->contact_phone}}
                        @else 
                            None
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label for="namefield">Contact Email</label>
                    <div class="form-control" id="namefield" name="namefield">
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
