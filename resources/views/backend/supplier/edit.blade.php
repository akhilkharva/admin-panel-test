@extends('layouts.master')

@section('title') Products @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title') Update Supplier @endslot
        @slot('li_1') Ecommerce @endslot
        @slot('li_2') Update Supplier @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Update Supplier</h4>
                    <p class="card-title-desc">Fill all information below</p>

                    <form role="form" class="add-supplier-form needs-validation"
                          action="{{ route('backend.supplier.update', $supplierDetail->id) }}"
                          method="post" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <x-jet-label for="name">Name</x-jet-label>
                                    <x-jet-input id="name" name="name" type="text" required value="{{$supplierDetail->name}}"/>
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
                                      rows="5" >{{$supplierDetail->description}}</textarea>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-group float-right">
                                <x-jet-button class="ml-4">
                                    {{ __('Update') }}
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
