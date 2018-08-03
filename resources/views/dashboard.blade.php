@extends('layouts.app')

@section('content')

<div class="container" style="height:80vh;">
    <h2 class="text-light mb-3 text-center">Welcome, {{\Auth::user()->name}}</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 mb-4">
                <div class="card-header bg-3 text-light">
                    <i class="fa fa-chart-bar"></i> Shipments for the last 10 months
                </div>
                <div class="card-body bg-1">
                    <div id="shieldui-chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 mb-4">
                <div class="card-header bg-3 text-light">
                    <i class="fa fa-rss"></i> Feed
                </div>
                <div class="card-body feed bg-1" style="height:440px;max-height: 440px ;overflow-y:auto;">
                    <section class="feed-item">
                        <div class="feed-item-body">
                            <i class="fa fa-comment"></i>
                            <a href="#" class="text-primary">John Doe</a> marked <a href="#" class="text-primary">order #5668</a> as Delivered.
                            <div class="time">
                                <small>3 h</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">
                        <div class="feed-item-body">
                            <i class="fa fa-check"></i>
                            <a href="#" class="text-primary">Broker 372</a> has submitted payment for<a href="#" class="text-primary"> invoice #5665</a>.
                            <div class="time">
                                <small>10 h</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">
                        <div class="feed-item-body">
                             <i class="fa fa-plus-square"></i>
                            New driver <a href="#" class="text-primary">Greg Wilson</a> registered with <a href="#" class="text-primary">Expedit Direct</a>.
                            <div class="time">
                                <small>Today</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">                            
                        <div class="feed-item-body">
                            <i class="fa fa-bolt"></i>
                            <a href="#" class="text-primary">Order #5670</a> has been flagged for review.
                            <div class="time">
                                <small>Yesterday</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">                            
                        <div class="feed-item-body">
                            <i class="fa fa-archive"></i>
                            <a href="#" class="text-primary">July Productivity Report</a> is ready.
                            <div class="time">
                                <small>Yesterday</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">                            
                        <div class="feed-item-body">
                            <i class="fa fa-shopping-cart"></i>
                            <a href="#" class="text-primary">Order #5671</a> needs additional processing.
                            <div class="time">
                                <small>Wednesday</small>
                            </div>
                        </div>
                    </section>
                    <section class="feed-item">
                        <div class="feed-item-body">
                            <i class="fa fa-arrow-down"></i>
                            <a href="#" class="text-primary">Load more...</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 mb-4">
                <div class="card-header bg-3 text-light">
                    <i class="fa fa-chart-bar" aria-hidden="true"></i> Order Sources One year tracking
                </div>
                <div class="card-body bg-1">
                    <div id="shieldui-grid1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-0 mb-4">
                <div class="card-header bg-3 text-light">
                    <i class="fa fa-chart-bar"></i> Annual Miles per region
                </div>
                <div class="card-body bg-1">
                    <div id="shieldui-chart2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 border-0">
                <div class="card-header bg-3 text-light">
                    <i class="fa fa-chart-bar"></i> Expenses Overview
                </div>
                <div class="card-body bg-1">
                    <ul class="server-stats">
                        <li>
                            <div class="key float-right">Fuel</div>
                            <div class="stat">
                                <div class="info">60%</div>
                                <div class="progress progress-small">
                                    <div style="width: 60%;" class="progress-bar progress-bar-danger"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="key float-right">Tolls</div>
                            <div class="stat">
                                <div class="info">29%</div>
                                <div class="progress progress-small">
                                    <div style="width: 29%;" class="progress-bar"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="key float-right">Misc</div>
                            <div class="stat">
                                <div class="info">31%</div>
                                <div class="progress progress-small">
                                    <div style="width: 31%;" class="progress-bar progress-bar-inverse"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 mb-4">
                <ul class="nav nav-tabs card-header bg-3 text-center">
                    <li class="active col-auto">
                        <a data-toggle="tab" href="#stats" class="text-light">Users</a>
                    </li>
                    <li class="col-auto">
                        <a data-toggle="tab" href="#report" class="text-light">Favorites</a>
                    </li>
                    <li class="col-auto">
                        <a data-toggle="tab" href="#dropdown1" class="text-light">Comments</a>
                    </li>
                </ul>
                <div class="tab-content card-body bg-1">
                    <div class="tab-pane clearfix active" id="stats">
                        <h5 class="tab-header"><i class="fa fa-calendar fa-2x"></i> Last logged-in users</h5>
                        <ul class="news-list pl-0">
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Ivan Gorge</a></div>
                                    <div class="position">Software Engineer</div>
                                    <div class="time">Last logged-in: Mar 12, 11:11</div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Roman Novak</a></div>
                                    <div class="position">Product Designer</div>
                                    <div class="time">Last logged-in: Mar 12, 19:02</div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Teras Uotul</a></div>
                                    <div class="position">Chief Officer</div>
                                    <div class="time">Last logged-in: Jun 16, 2:34</div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Deral Ferad</a></div>
                                    <div class="position">Financial Assistant</div>
                                    <div class="time">Last logged-in: Jun 18, 4:20</div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Konrad Polerd</a></div>
                                    <div class="position">Sales Manager</div>
                                    <div class="time">Last logged-in: Jun 18, 5:13</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="report">
                        <h5 class="tab-header"><i class="fa fa-star fa-2x"></i> Popular contacts</h5>
                        <ul class="news-list news-list-no-hover pl-0">
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Pol Johnsson</a></div>
                                    <div class="options">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-phone"></i>
                                            Call
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-envelope-o"></i>
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Terry Garel</a></div>
                                    <div class="options">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-phone"></i>
                                            Call
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-envelope-o"></i>
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Eruos Forkal</a></div>
                                    <div class="options">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-phone"></i>
                                            Call
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-envelope-o"></i>
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Remus Reier</a></div>
                                    <div class="options">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-phone"></i>
                                            Call
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-envelope-o"></i>
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Lover Lund</a></div>
                                    <div class="options">
                                        <button class="btn btn-xs btn-success">
                                            <i class="fa fa-phone"></i>
                                            Call
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <i class="fa fa-envelope-o"></i>
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="dropdown1">
                        <h5 class="tab-header"><i class="fa fa-comments fa-2x"></i> Top Commenters</h5>
                        <ul class="news-list pl-0">
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Edin Garey</a></div>
                                    <div class="comment">
                                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur 
                                        aut odit aut fugit,sed quia
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Firel Lund</a></div>
                                    <div class="comment">
                                        Duis aute irure dolor in reprehenderit in voluptate velit
                                         esse cillum dolore eu fugiat.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Jessica Desingter</a></div>
                                    <div class="comment">
                                        Excepteur sint occaecat cupidatat non proident, sunt in
                                         culpa qui officia deserunt.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Novel Forel</a></div>
                                    <div class="comment">
                                        Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-user fa-4x float-left"></i>
                                <div class="news-item-info">
                                    <div class="name"><a href="#">Wedol Reier</a></div>
                                    <div class="comment">
                                        Laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
                                        et quasi.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div class="card">
        </div>
    </div>






</div>


    


    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                traffic = [
                {
                    Source: "Broker 1", Amount: 24, Change: 53, Percent: 31, Target: 20
                },
                {
                    Source: "Broker 2", Amount: 17, Change: 34, Percent: 22, Target: 20
                },
                {
                    Source: "Broker 3", Amount: 10, Change: 67, Percent: 13, Target: 12
                },
                {
                    Source: "Broker 4", Amount: 6, Change: 23, Percent: 8, Target: 10
                },
                {
                    Source: "Broker 5", Amount: 21, Change: 78, Percent: 27, Target: 20
                }];


            $("#shieldui-chart1").shieldChart({
                theme: "dark",

                primaryHeader: {
                    text: "Shipments"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Shipments marked as delivered",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                theme: "dark",
                primaryHeader: {
                    text: "Miles Driven"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "pie",
                    collectionAlias: "traffic",
                    data: visits
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: traffic
                },
                sorting: {
                    multiple: true
                },
                rowHover: false,
                paging: false,
                columns: [
                { field: "Source", width: "170px", title: "Source" },
                { field: "Amount", title: "Amount" },                
                { field: "Percent", title: "Percent", format: "{0} %" },
                { field: "Target", title: "Target" },
                ]
            });            
        });        
    </script>
@endsection
