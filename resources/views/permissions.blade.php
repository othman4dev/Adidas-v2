@extends('layout')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
    <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Products</h3>
    </div>
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
                                    <li><a href="#"><span>New Items</span></a></li>
                                    <li><a href="#"><span>Featured</span></a></li>
                                    <li><a href="#"><span>Out of Stock</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nk-block-tools-opt">
                        <a href="#" data-target="addProduct" class="toggle btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                        <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="nk-block">
    <div class="nk-tb-list is-separate mb-3">
        <div class="nk-tb-item nk-tb-head">
            <div class="nk-tb-col nk-tb-col-check">
                <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="pid">
                    <label class="custom-control-label" for="pid"></label>
                </div>
            </div>
            <div class="nk-tb-col tb-col-sm"><span>Permission_Name</span></div>
            <div class="nk-tb-col tb-col-sm"><span>Permission Role</span></div>
        </div>
        @foreach($Roles as $Role)
        <div class="nk-tb-item">
            <div class="nk-tb-col nk-tb-col-check">
                <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="pid1">
                    <label class="custom-control-label" for="pid1"></label>
                </div>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                  <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                  <span class="title">{{$Role->name}}</span>
                </span>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <div class="content d-flex flex-wrap">
                    @if(isset($dataPermissions[$Role->name]))
                        @foreach($dataPermissions[$Role->name] as $permissions)
                            <span class="tb-product mx-2 me-3 pt-2" >
                                <div class="dropdown">
                                    <form action="DeletePermission" method="post">
                                        @csrf
                                        <span  class="dropdown-toggle p-1 rounded-1 title" style="background: #854fff !important; color:white;" data-bs-toggle="dropdown">
                                            {{$permissions}}
                                        </span>
                                        <input type="hidden" name="role_id" value="{{$Role->id}}">
                                        <input type="hidden" name="name" value="{{$permissions}}">
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li class="text-center"><button type="submit" class="btn btn-danger m-2"><em class="icon ni ni-trash"></em><span>Remove Selected</span></button></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
   
    </div>
    <form action="/addPermission" method='post'>
        @csrf
      <div class="nk-add-product toggle-slide toggle-slide-right toggle-screen-any" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: -24px;">
          <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
          </div>
          <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
              <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                <div class="simplebar-content" style="padding: 24px;">
                  <div class="nk-block-head">
              <div class="nk-block-head-content">
                  <h5 class="nk-block-title">New Permission</h5>
                  <div class="nk-block-des">
                      <p>Add information and add new Permission.</p>
                  </div>
              </div>
          </div>
          <div class="nk-block">
              <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Permission Role</label>
                            <div class="form-control-wrap">
                                <select name="role_id" class="form-select">
                                    @foreach($Roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Permission Route</label>
                            <div class="form-control-wrap">
                                <select name="route_id[]" class="form-select" multiple size="20">
                                    @foreach($Routes as $Route)
                                        <option value="{{$Route->id}}">{{$Route->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                    </div>
              </div>
          </div>
      </div>
    </form>
</div></div></div><div class="simplebar-placeholder" style="width: auto; height: 866px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 700px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div></div>
</div>
@endsection