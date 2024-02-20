@extends('layout')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Orders</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-search"></em>
                                    </div>
                                    <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                </div>
                            </li>
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>On Hold</span></a></li>
                                            <li><a href="#"><span>Delevired</span></a></li>
                                            <li><a href="#"><span>Rejected</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nk-block-tools-opt">
                                <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-tb-list is-separate is-medium mb-3">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                        <input type="checkbox" class="custom-control-input" id="oid">
                        <label class="custom-control-label" for="oid"></label>
                    </div>
                </div>
                <div class="nk-tb-col"><span>Order</span></div>
                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                <div class="nk-tb-col"><span class="d-none d-sm-block">Status</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                <div class="nk-tb-col tb-col-md"><span>Price</span></div>
                <div class="nk-tb-col tb-col-md"><span>Quantity</span></div>
                <div class="nk-tb-col"><span>Total</span></div>
            </div><!-- .nk-tb-item -->
            @foreach($sales as $sale)
            <div class="nk-tb-item">
                <div class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                        <input type="checkbox" class="custom-control-input" id="oid01">
                        <label class="custom-control-label" for="oid01"></label>
                    </div>
                </div>
                <div class="nk-tb-col">
                    <span class="tb-lead"><a href="#">#{{$sale->product->name}}</a></span>
                </div>
                <div class="nk-tb-col tb-col-md">
                    <span class="tb-sub">{{$sale->created_at}}</span>
                </div>
                <div class="nk-tb-col">
                    <span class="dot bg-warning d-sm-none"></span>
                    @if($sale->status == 'pending')
                    <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">{{$sale->status}}</span>
                    @else
                    <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">{{$sale->status}}</span>
                    @endif
                </div>
                <div class="nk-tb-col tb-col-sm">
                    <span class="tb-sub">{{$sale->user->name}}</span>
                </div>
                <div class="nk-tb-col tb-col-md">
                    <span class="tb-sub text-primary fw-bold tb-lead">{{$sale->price}}</span>
                </div>
                <div class="nk-tb-col tb-col-md">
                    <span class="tb-sub text-primary fw-bold tb-lead">{{$sale->quantite}}</span>
                </div>
                <div class="nk-tb-col">
                    <span class="tb-lead">$ {{$sale->quantite * $sale->price}}</span>
                </div>
            </div>
            @endforeach
        </div><!-- .nk-tb-list -->
      
    </div><!-- .nk-block -->
</div>
@endsection