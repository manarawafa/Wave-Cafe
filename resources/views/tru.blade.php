@extends('admin.layout')
@section('title','beverage')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Beverage</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Beverages</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Beverage Date</th>
                                                <th>Title</th>
                                                <th>content</th>
                                                <th>Published</th>
                                                <th>Special</th>
                                                <th>Category id</th>
                                                <th>Image</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $Beveragee as $val )
                                            <tr>
                                                <td>{{$val->created_at}}</td>
                                                <td>{{$val->title}}</td>
                                                <td>{{$val->content}}</td>
                                                <td>{{$val->published}}</td>
                                                <td>{{$val->special}}</td>
                                                <td>{{$val->category_id}}</td>
                                                <td><img src="{{ asset('beverageee/'.$val->image) }}" />

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@endsection

@foreach($Category as $val)
<div id="{{$val->id}}" class="tm-tab-content">
    <div class="tm-list">
        @foreach($Beverage as $vall)
        <div class="tm-list-item">
            <img src="{{ asset('beverageee/'.$vall->image) }}" alt="Image" class="tm-list-item-img">
            <div class="tm-black-bg tm-list-item-text">
                <h3 class="tm-list-item-name">{{$vall->title}}<span class="tm-list-item-price">{{$vall->price}}</span>
                </h3>
                <p class="tm-list-item-description">{{$vall->content}}</p>
            </div>
        </div>
        @endforeach


    </div>
</div>
@endforeach