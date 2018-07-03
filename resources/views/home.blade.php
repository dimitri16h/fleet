@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active show" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Expedite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="" role="tab" aria-controls="profile" aria-selected="false">Truckin.com</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="" role="tab" aria-controls="contact" aria-selected="false">Haulers</a>
        </li>
        <li>
            <a class="navbar-right" id="new-tab" href="" aria-controls="new" aria-selected="false">Add New Company +</a>
        </li>
    </ul>
    </div>

    <div class="tab-content bg-light" id="myTabContent">

    <div class="tab-pane active show p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
    </div>


    <div class="tab-pane p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
    </div>


    <div class="tab-pane p-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
      <div class="bg-dark m-2" style="height:50px; width:50px;"></div>
    </div>
  </div>















    <div class="row justify-content-md-center mt-5">
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
    </div>
</div>
@endsection
