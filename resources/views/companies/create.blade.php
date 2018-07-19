@extends('layouts.app')

@section('content')
<div class="container text-center" style="height:80vh;">

<h2 class="text-light mb-3">Add New Company</h2>

    <div class="row d-flex align-items-center h-50">
        <div class="col-md-5 align-middle">
            <div class="card" style="border:none;">
                <div class="card-header text-light" style="background-color:#405265;">Join Existing</div>

                <div class="card-body" style="background-color:#d3d0bc;">
                    <form>
                        <div class="form-group">
                            Enter your company code:
                            <input type="text" class="form-control" id="company-code" placeholder="xxx-xxx-xxx" style="margin-top: 15px;">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <h4 class="text-light m-2 col text-center">or</h4>

        <div class="col-md-5 align-middle">
            <div class="card" style="border:none;">
                <div class="card-header text-light" style="background-color:#405265;">Create New</div>

                <div class="card-body" style="background-color:#d3d0bc;">
                    <form method="post" action="/companies">
                        <div class="form-group">
                            Company Name:
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Name here" style="margin-top: 15px;">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
