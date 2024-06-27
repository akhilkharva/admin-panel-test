@extends('layouts.master')

@section('title') Products @endsection
@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}"
          rel="stylesheet">
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title') Add Supplier @endslot
        @slot('li_1') Ecommerce @endslot
        @slot('li_2') Add Supplier @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Supplier</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <form role="form" class="add-supplier-form needs-validation"
                          action="{{ route('backend.supplier.store') }}"
                          method="post" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <x-jet-label for="name">Name</x-jet-label>
                                    <x-jet-input id="name" name="name" type="text" required/>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <x-jet-label for="description" value="{{ __('Supplier Description') }}"/>
                            <textarea class="form-control" id="description" name="description"
                                      rows="5"></textarea>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-group float-right">
                                <x-jet-button class="ml-4">
                                    {{ __('Create') }}
                                </x-jet-button>
                                <a href="{{ route('backend.supplier.index')}}"
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
    <!-- end row -->
@endsection

@section('script')
    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js')}}"></script>

@endsection
