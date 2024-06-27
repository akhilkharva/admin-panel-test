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
        @slot('title') Add Product @endslot
        @slot('li_1') Ecommerce @endslot
        @slot('li_2') Add Product @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    {{--<div id="basic-pills-wizard" class="twitter-bs-wizard">
                        <ul class="twitter-bs-wizard-nav">
                            <li class="nav-item">
                                <a href="#product-details" class="nav-link" data-toggle="tab">
                                    <span class="step-number">01</span>
                                    <span class="step-title">Product Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-images" class="nav-link" data-toggle="tab">
                                    <span class="step-number">02</span>
                                    <span class="step-title">Product Images</span>
                                </a>
                            </li>
                            --}}{{--<li class="nav-item">
                                <a href="#confirm-detail" class="nav-link" data-toggle="tab">
                                    <span class="step-number">03</span>
                                    <span class="step-title">Confirm Detail</span>
                                </a>
                            </li>--}}{{--
                        </ul>

                        <div class="tab-content twitter-bs-wizard-tab-content">
                            <div class="tab-pane" id="product-details">
                                <h4 class="card-title">Add Product</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                <form role="form" class="add-product-form needs-validation"
                                      action="{{ route('backend.product.store') }}"
                                      id="add-product-form" method="post" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <x-jet-label for="sku">SKU</x-jet-label>
                                                <x-jet-input id="sku" name="sku" type="text" required/>
                                                @if ($errors->has('sku'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('sku') }}
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <x-jet-label for="supplier">Supplier</x-jet-label>
                                                <select class="form-control select2" name="supplier" id="supplier"
                                                        required>
                                                    <option>Select</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option
                                                            value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <x-jet-label class="control-label"
                                                             value="{{ __('Supplier Category') }}"/>
                                                <select class="form-control select2" id="supplier_category"
                                                        name="supplier_category">
                                                    <option>Select</option>
                                                    @foreach($supplierCategories as $supplierCategory)
                                                        <option
                                                            value="{{ $supplierCategory->id }}">{{ $supplierCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <x-jet-label for="price" value="{{ __('Price') }}"/>
                                                <x-jet-input id="price" name="price" type="text" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <x-jet-label for="url" value="{{ __('Supplier URL') }}"/>
                                                <x-jet-input id="url" name="url" type="url" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <x-jet-label class="control-label" for="title"
                                                             value="{{ __('Title') }}"/>
                                                <x-jet-input id="title" name="title" type="text" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <x-jet-label for="description" value="{{ __('Product Description') }}"/>
                                                <textarea class="form-control" id="description" name="description"
                                                          rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-group float-right">
                                            <x-jet-button class="ml-4">
                                                {{ __('Save') }}
                                            </x-jet-button>
                                            <a href="{{ route('backend.product.index')}}"
                                               class="btn btn-secondary">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="product-images">
                                <h4 class="card-title">Add Product</h4>
                                <p class="card-title-desc">Fill all information below</p>

                                <form role="form" class="add-product-form needs-validation dropzone"
                                          action="{{ route('backend.product.store') }}"
                                          id="my-awesome-dropzone" method="post" enctype="multipart/form-data"
                                          novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group" id="myAwesomeDropzone">

                                                    <x-jet-label for="images"
                                                                 value="{{ __('Upload Product Images') }}"/>
                                                    <div class="fallback">
                                                        <input name="images[]" type="file" multiple="multiple"
                                                               accept="image/*">
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                                        </div>

                                                        <h4>Drop images here or click to upload.</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


                            </div>
                            --}}{{--<div class="tab-pane" id="confirm-detail">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                            </div>
                                            <div>
                                                <h5>Confirm Detail</h5>
                                                <p class="text-muted">If several languages coalesce, the grammar of the
                                                    resulting</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}{{--

                        </div>
                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                            <li class="previous"><a href="#">Previous</a></li>
                            <li class="next"><a href="#">Next</a></li>
                        </ul>
                    </div>--}}
                    {{--old--}}
                    <div class="twitter-bs-wizard">
                        <div class="tab-pane" id="basic-info">
                            <h4 class="card-title">Add Product</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form role="form" class="add-product-form needs-validation dropzone12"
                                  action="{{ route('backend.product.store') }}"
                                  id="my-awesome-dropzone" method="post" enctype="multipart/form-data" novalidate>
                                @csrf

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="sku">SKU</x-jet-label>
                                            <x-jet-input id="sku" name="sku" type="text" required/>
                                            @if ($errors->has('sku'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('sku') }}
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="supplier">Supplier</x-jet-label>
                                            <select class="form-control select2" name="supplier" id="supplier" required>
                                                <option>Select</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label class="control-label" value="{{ __('Supplier Category') }}"/>
                                            <select class="form-control select2" id="supplier_category"
                                                    name="supplier_category">
                                                <option>Select</option>
                                                @foreach($supplierCategories as $supplierCategory)
                                                    <option
                                                        value="{{ $supplierCategory->id }}">{{ $supplierCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="price" value="{{ __('Price') }}"/>
                                            <x-jet-input id="price" name="price" type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label for="url" value="{{ __('Supplier URL') }}"/>
                                            <x-jet-input id="url" name="url" type="url" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label class="control-label" for="title" value="{{ __('Title') }}"/>
                                            <x-jet-input id="title" name="title" type="text" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <x-jet-label for="description" value="{{ __('Product Description') }}"/>
                                            <textarea class="form-control" id="description" name="description"
                                                      rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>


                                {{--<div class="form-group dropzone" id="myAwesomeDropzone">

                                    <x-jet-label for="images" value="{{ __('Upload Product Images') }}"/>
                                    <div class="fallback">
                                        <input name="images[]" type="file" multiple="multiple" accept="image/*">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                        </div>

                                        <h4>Drop images here or click to upload.</h4>
                                    </div>
                                </div>--}}

                                <div class="col-xl-12">
                                    <div class="form-group float-right">
                                        <x-jet-button class="ml-4">
                                            {{ __('Create') }}
                                        </x-jet-button>
                                        <a href="{{ route('backend.product.index')}}"
                                           class="btn btn-hero btn-noborder btn-alt-secondary">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
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

    <!-- form wizard init -->
    <script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js')}}"></script>

    <!-- select 2 plugin -->
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>

    <!-- dropzone plugin -->
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{ URL::asset('/plugins/jquery-repeater/jquery.repeater.js')}}"></script>
    <script type="text/javascript">

        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });

        /*Dropzone.options.myAwesomeDropzone =
            {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };*/
    </script>
@endsection
