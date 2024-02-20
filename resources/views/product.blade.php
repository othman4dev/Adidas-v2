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
            <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
            <div class="nk-tb-col"><span>Price</span></div>
            <div class="nk-tb-col"><span>Stock</span></div>
            <div class="nk-tb-col tb-col-md"><span>Category</span></div>
            <div class="nk-tb-col tb-col-md"><span>Tages</span></div>
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
        @foreach($products as $product)
        <div class="nk-tb-item">
            <div class="nk-tb-col nk-tb-col-check">
                <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="pid1">
                    <label class="custom-control-label" for="pid1"></label>
                </div>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                    <img src="{{asset('storage/images/'.$product->imageuri)}}" alt="" class="thumb">
                    <span class="title">{{$product->name}}</span>
                </span>
            </div>
            <div class="nk-tb-col">
                <span class="tb-lead">$ {{$product->price}}</span>
            </div>
            <div class="nk-tb-col">
                <span class="tb-sub">{{$product->stock}}</span>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span class="tb-sub">{{$product->category->name}}</span>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span class="tb-sub ">
                @if(!empty($TagList[$product->id]))
                    @foreach($TagList[$product->id] as $tageList)
                        <span class="fw-normal mb-1 mx-1 d-flex flex-wrap">#{{$tageList->name}}</span>
                    @endforeach
                @endif
                </span>
            </div>
            <div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#UpdateProduct{{$product->id}}"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                    <li><a href="DeletProduct/{{$product->id}}"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal fade" id="UpdateProduct{{$product->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Category Info</h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body">
                            <form action="/UpdateProduct/{{$product->id}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="product-title">Product Title</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="product-title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-mb-6">
                                        <div class="form-group">
                                            <label class="form-label" for="sale-price">Sale Price</label>
                                            <div class="form-control-wrap">
                                                <input type="number" name='price' value="{{$product->price}}" class="form-control" id="sale-price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-mb-6">
                                        <div class="form-group">
                                            <label class="form-label" for="stock">Stock</label>
                                            <div class="form-control-wrap">
                                                <input type="number" name="stock"  class="form-control" id="stock" value="{{$product->stock}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-mb-6">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea  name="description" class="form-control">{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Category</label>
                                            <div class="form-control-wrap">
                                                <select name="category_id" class='form-select  mt-3'>
                                                    @foreach($categories as $categorie)
                                                    <option value="{{ $categorie->id }}" @if($categorie->id == $product->category->id) selected @endif> 
                                                    {{ $categorie->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="tags">Tags</label>
                                            <div class="form-control-wrap">
                                                <select name="tages_id[]" class='form-select  mt-3' multiple>
                                                @foreach($tages as $tage)
                                                    <option value="{{ $tage->id }}" 
                                                        @if(isset($TagList[$product->id]))
                                                            @foreach($TagList[$product->id] as $selectedTag)
                                                                @if($tage->id == $selectedTag->id) selected @endif
                                                            @endforeach
                                                        @endif > {{ $tage->name }}
                                                    </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="upload-zone small bg-lighter my-2 dropzone dz-clickable">
                                            <div class="dz-message">
                                                <input type="file" name="image" id="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Save Informations</span></button>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
    </div>
    <form action="/addProduct" method='POST' enctype="multipart/form-data">
        @csrf
    <div class="nk-add-product toggle-slide toggle-slide-right toggle-screen-any" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -24px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 24px;">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">New Product</h5>
                <div class="nk-block-des">
                    <p>Add information and add new product.</p>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Product Title</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" id="product-title">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="sale-price">Sale Price</label>
                        <div class="form-control-wrap">
                            <input type="number" name='price' class="form-control" id="sale-price">
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label" for="stock">Stock</label>
                        <div class="form-control-wrap">
                            <input type="number" name="stock" class="form-control" id="stock" >
                        </div>
                    </div>
                </div>
                <div class="col-mb-6">
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <div class="form-control-wrap">
                            <textarea  name="description"  id="editor"   class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <div class="form-control-wrap">
                            <select name="category_id" class='form-select  mt-3'>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="tags">Tags</label>
                        <div class="form-control-wrap">
                            <select name="tages_id[]" class='form-select  mt-3' multiple>
                                @foreach($tages as $tage)
                                <option value="{{ $tage->id}}">{{$tage->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="upload-zone small bg-lighter my-2 dropzone dz-clickable">
                        <div class="dz-message">
                            <input type="file" name="image" id="" class="form-control">
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