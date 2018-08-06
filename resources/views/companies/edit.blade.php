@extends('layouts.app')

@section('content')
<div class="container" style="height:80vh;">

    <h2 class="text-light mb-3">{{$company->name}}</h2>
    <form method="post" action="/companies/{{$company->id}}">
    @method('PUT')
    @csrf


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
                        <label for="name">Name <small> required</small></label>
                        <input class="form-control" id="name" name="name" value="{{$company->name}}"placeholder="Required">
                    </div>
                    <div class="form-group col-md">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" name="phone" value="{{$company->phone}}" placeholder="Ex: 888-888-8888">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="address1">Address</label>
                        <input class="form-control" id="address1" name="address1" value="{{$company->address1}}" placeholder="Ex: 123 My Street">
                        <input class="form-control" id="address2" name="address2" value="{{$company->address2}}" placeholder="Ex: 12345, City, State">
                    </div>
                </div>
          </div>



          <div class="tab-pane fade card-body" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                    <div class="form-group col-md">
                        <label for="billingName">Name (Billing Purposes)</label>
                        <input class="form-control" id="billingName" name="billingName" value="{{$company->billing_name}}" placeholder= "Ex: My Co LLC">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="billingAddress1">Address (Billing Purposes)</label>
                        <input class="form-control" id="billingAddress1" name="billingAddress1" value="{{$company->billing_address1}}" placeholder="Ex: 123 My Street">
                        <input class="form-control" id="billingAddress2" name="billingAddress2" value="{{$company->billing_address2}}" placeholder="Ex: 12345, City, State">
                    </div>
                </div>
          </div>



          <div class="tab-pane fade card-body" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="form-group col-md">
                        <label for="contactName">Contact Name</label>
                        <input class="form-control" id="contactName" name="contactName" value="{{$company->contact_name}}" placeholder="Ex: John Smith or Customer Relations">
                    </div>
                    <div class="form-group col-md">
                        <label for="contactPhone">Contact Phone</label>
                        <input class="form-control" id="contactPhone" name="contactPhone" value="{{$company->contact_phone}}" placeholder="Ex: 888-888-8888">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="contactEmail">Contact Email</label>
                        <input class="form-control" id="contactEmail" name="contactEmail" value="{{$company->contact_email}}" placeholder="Ex: JohnSmith@ContactUs.com">
                    </div>
                </div>
          </div>


          <div class="card-footer bg-1">
                <a href="/companies/{{$company->id}}" class="btn btn-danger">Cancel</a>
                <button href="/companies/{{$company->id}}/edit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
    
</div>
@endsection
