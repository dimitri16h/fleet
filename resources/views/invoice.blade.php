<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <style>
    @media only print {
      @page { margin: 0; }
      body { margin: 2cm; margin-top: 4cm;}
    }

    .tablehead {
        border: black solid 2px;
    }
    .mytable > div{
        height: 30vh;
    }
    .mytablefoottop {
        border-top: 2px solid black;
        border-left: 2px black solid;
        border-right: 2px black solid;
    }
    .mytablefoot {
        border-left: 2px black solid;
        border-right: 2px black solid;
        border-bottom: 2px black solid;
    }
    .bordl {
        border-left: 2px black solid;
    }
    .bordr {
        border-right: 2px black solid;
    }
    </style>

<div class="container" id="app">
    <div id="header" class="row mt-3">
        <div id="header-left" class="col">
            <h2>{{$company->name}}</h2>
            @if ($company->address1 && $company->address2)
            {{$company->address1}}<br/>{{$company->address2}}
            @elseif ($company->address2)
            {{$company->address2}}
            @endif
        </div>
        <div id="header-mid" class="col text-center mt-2">
            @if ($company->phone)
                {{$company->phone}}
            @endif
        </div>
        <div id="header-right" class="col text-right">
            <h2>INVOICE</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <strong>Bill To: <br/></strong>
            @if ($customer)
            {{$customer->name}}
            @endif
            @if ($customer->billing_address1 && $customer->billing_address2)
                {{$customer->billing_address1}}<br/>{{$customer->billing_address2}}
            @elseif ($customer->address1 && $customer->address2)
                {{$customer->address1}}<br/> {{$customer->address2}}
            @endif
        </div>
        <div class="col-3 text-right" style="border-right :2px black solid; margin-bottom:20px;">
            Invoice#<br/><br/>
            Broker Load#<br/><br/>
            Date<br/><br/><br/>
        </div>
        <div class="col-3 text-right">
            {{$load->internal_number}}<br/><br>
            @if ($load->external_number)
            {{$load->external_number}}<br><br>
            @else
            <br/><br/>
            @endif
            {{now()->format('m/d/Y')}}
        </div>
    </div>

    <div class="row text-center tablehead mt-5 bg-light">
        <div class="col-3">
            Invoice
        </div>
        <div class="col-6">
            Description
        </div>
        <div class="col-3">
            Amount
        </div>
    </div>

    <div class="row text-center mytable">
        <div class="col-3 pt-2 bordl">
            {{$load->internal_number}}
        </div>
        <div class="col-6 pt-2 bordl bordr">
            @if ($load->description)
                {{$load->description}}
            @else
                None
            @endif
        </div>
        <div class="col-3 pt-2 bordr">
            @if($load->rate)
                <td>${{number_format((float)$load->rate/100, 2, '.', '')}}</td>
            @endif
        </div>
    </div>
    <div class="row mytablefoottop">
        <div class="col-6">
        </div>
        <div class="col-3">
            Total Due:
        </div>
        <div class="col-3 text-right pr-2">
            ${{number_format((float)$load->total/100, 2, '.', '')}}
        </div>
    </div>
    <div class="row mytablefoot pt-3">
        <div class="col-6">
        </div>
        <div class="col-3">
            Due Date:
        </div>
        <div class="col-3 text-right pr-2">
            {{now()->addDays(15)->format('m/d/Y')}}
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6" style="font-size:.8rem;">
        @if ($company->contact_phone || $company->contact_email || $company->phone)
            <strong>Direct All Inquiries To:</strong>
            <br/>
            @if ($company->contact_name)
                {{$company->contact_name}}
            @else 
                {{$company->name}}
            @endif
            <br/>
            @if ($company->contact_phone)
                {{$company->contact_phone}}
            @elseif ($company->phone)
                {{$company->phone}}
            @endif
            <br/>
            @if ($company->contact_email)
                {{$company->contact_email}}
            @endif
        @endif
        </div>
        <div class="col-3">
        </div>
        <div class="col-3 text-left" style="font-size:.8rem;">
            <div class="text-center">
                <strong>Remit To:</strong><br/>
            </div>
            @if ($company->billing_name) 
                {{$company->billing_name}}
            @else 
                {{$company->name}}
            @endif
            <br/>
            @if ($company->billing_address1 && $company->billing_address2)
                {{$company->billing_address1}}<br/>{{$company->billing_address2}}
            @elseif ($company->address1 && $company->address2)
                {{$company->address1}}<br/>{{$company->address2}}
            @endif
        </div>
    </div>
    <div class="row mt-5">
        <div class="col text-center font-weight-bold font-italic">
            Thank You For Your Business
        </div>
    </div>







</div>

    
</body>
</html>