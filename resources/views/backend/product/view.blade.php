@extends('layouts.master')

@section('title') Products @endsection
@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}"
          rel="stylesheet">

    <!-- select2 css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title') View Product @endslot
        @slot('li_1') Ecommerce @endslot
        @slot('li_2') View Product @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">
                        <div class="tab-pane" id="basic-info">
                            <h4 class="card-title">View Product</h4>
                            <p class="card-title-desc">Shows all the information about product</p>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="sku">SKU</label>
                                        <input id="sku" name="sku" type="text" class="form-control"
                                               value="{{$productDetail->sku}}" disabled>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Supplier</label>
                                        <select class="form-control select2" name="supplier" id="supplier" disabled>
                                            <option>Select</option>
                                            @foreach($suppliers as $supplier)
                                                <option
                                                    value="{{ $supplier->id }}" {{ $supplier->id == $productDetail->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Supplier Category</label>
                                        <select class="form-control select2" id="supplier_category"
                                                name="supplier_category" disabled>
                                            <option>Select</option>
                                            @foreach($supplierCategories as $supplierCategory)
                                                <option
                                                    value="{{ $supplierCategory->id }}" {{ $supplierCategory->id == $productDetail->supplier_id ? 'selected' : '' }}>{{ $supplierCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input id="price" name="price" type="text" class="form-control"
                                               value="{{$productDetail->price}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Supplier URL</label>
                                        <input id="url" name="url" type="url" class="form-control"
                                               value="{{$productDetail->url}}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input id="title" name="title" type="text" class="form-control"
                                               value="{{$productDetail->title}}" disabled>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="productdesc">Product Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                          disabled>{{$productDetail->description}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-4 mt-md-0">
                                    <h5 class="font-size-14">Product Images :</h5>
                                    @foreach($productDetail->productImages as $productImage)

                                        <img class="rounded-circle avatar-xl ml-4" alt="200x200"
                                             src="{{ URL::asset('/storage/images/products/'.$productImage->image)}}"
                                             data-holder-rendered="true" title="{{$productImage->image}}">

                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group float-right">
                                    <a href="{{ route('backend.product.index')}}"
                                       class="btn btn-hero btn-noborder btn-primary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>

    <!-- select 2 plugin -->
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>

    <!-- dropzone plugin -->
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js')}}"></script>
@endsection
