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
            <div class="nk-tb-col tb-col-sm"><span>Tage Name</span></div>
            <div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @foreach($tages as $tage)
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
                  <span class="title">{{$tage->name}}</span>
                </span>
            </div>
            <div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#updateTage{{$tage->id}}"><em class="icon ni ni-edit"></em><span>Edit Tage</span></a></li>
                                    <li><a href="/DeletTage/{{$tage->id}}"><em class="icon ni ni-trash"></em><span>Remove Tage</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="updateTage{{$tage->id}}">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Tage Info</h5>
                      <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <em class="icon ni ni-cross"></em>
                      </a>
                  </div>
                  <div class="modal-body">
                      <form action="/updateTags/{{$tage->id}}" method="post" class="form-validate is-alter">
                      @csrf
                          <div class="form-group">
                              <label class="form-label" for="full-name">Tage Name</label>
                              <div class="form-control-wrap">
                                  <input type="text" value="{{$tage->name}}" name="name" class="form-control" id="full-name" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer bg-light">
                      <span class="sub-text">Modal Footer Text</span>
                  </div>
              </div>
          </div>
        </div>
        @endforeach
    </div>
    {{ $tages->links() }}
   
    </div>
    <form action="/addTags" method='POST'>
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
                  <h5 class="nk-block-title">New Tages</h5>
                  <div class="nk-block-des">
                      <p>Add information and add new tage.</p>
                  </div>
              </div>
          </div>
          <div class="nk-block">
              <div class="row g-3">
                  <div class="col-12">
                      <div class="form-group">
                          <label class="form-label" for="product-title">Tage Title</label>
                          <div class="form-control-wrap">
                              <input type="text" name="name" class="form-control" id="product-title">
                          </div>
                      </div>
                  </div>
                  <div class="col-12">
                      <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                  </div>
              </div>
          </div>
      </div>
    </form>
</div></div></div><div class="simplebar-placeholder" style="width: auto; height: 866px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 700px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div></div>
</div>
@endsection