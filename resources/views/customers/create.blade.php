@extends('layouts.app')

@section('content')

<div class="container" style="height:80vh;">
    
    <h2 class="text-light mb-0">{{$company->name}}</h2>
    <h4 class="text-light mb-0 pb-0">New Customer Form</h4>

    <form method="post" action="/customers">
    @csrf
        <input type="hidden" name="companyid" value="{{$company->id}}">

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
                        <input class="form-control" id="name" name="name" placeholder="Required">
                    </div>
                    <div class="form-group col-md">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" name="phone" placeholder="Ex: 888-888-8888">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="address1">Address</label>
                        <input class="form-control" id="address1" name="address1" placeholder="Ex: 123 My Street">
                        <input class="form-control" id="address2" name="address2" placeholder="Ex: City, State, 12345">
                    </div>
                </div>
          </div>



          <div class="tab-pane fade card-body" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                    <div class="form-group col-md">
                        <label for="billingName">Name (Billing Purposes)</label>
                        <input class="form-control" id="billingName" name="billingName" placeholder= "Ex: My Co LLC">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="billingAddress1">Address (Billing Purposes)</label>
                        <input class="form-control" id="billingAddress1" name="billingAddress1" placeholder="Ex: 123 My Street">
                        <input class="form-control" id="billingAddress2" name="billingAddress2" placeholder="Ex: City, State, 12345">
                    </div>
                </div>
          </div>


          <div class="card-footer bg-1">
                <a href="/customers" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection
