<template>
        <div class="container" style="height:80vh;">
    
    <h2 class="text-light mb-3">{{$company->name}}</h2>
    <h4 class="text-light mb-3">New Order Form</h4>

    <form method="post" action="/orders">
    @csrf
        <input type="hidden" name="companyid" value="{{$company->id}}">

        <ul class="nav nav-tabs mt-5 bg-1" id="myTab" role="tablist">
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
                        <label for="orderNum">Order # <small> required</small></label>
                        <input class="form-control" id="orderNum" name="orderNum" placeholder="Required">
                    </div>
                    <div class="form-group col-md">
                        <label for="external">External Order #</label>
                        <input class="form-control" id="external" name="external" placeholder="Ex: Broker Order #">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="customer">Customer</label>
                        <select class="form-control" id="customer" name="customer">
                            <option>Select from Current</option>
                            @foreach ($company->customers()->orderBy('id')->get() as $customer)
                            <option>{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="newCustomer">New Customer</label><br/>
                        <button type="button" id="newCustomer" class="btn btn-primary">Create New Customer</button>
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
                        <input class="form-control" id="billingAddress2" name="billingAddress2" placeholder="Ex: 12345, City, State">
                    </div>
                </div>
          </div>


          <div class="card-footer bg-1">
                <a href="/customers" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
