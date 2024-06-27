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
        @slot('title') Edit Doctor @endslot
        @slot('li_1') List @endslot
        @slot('li_2') Edit Doctor @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">

                        <div class="tab-pane" id="basic-info">
                            <h4 class="card-title">Update Doctor</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form role="form" class="update-doctor-form needs-validation"
                                  action="{{ route('backend.doctor.update',  $doctorDetail->id) }}"
                                  id="edit_product" method="post" enctype="multipart/form-data" novalidate>
                                @csrf


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label for="first_name">First Name</x-jet-label>
                                            <x-jet-input id="first_name" name="first_name" type="text" value="{{$doctorDetail->first_name}}" required/>
                                            <x-jet-input-error for="first_name"></x-jet-input-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label for="last_name">Last Name</x-jet-label>
                                            <x-jet-input id="last_name" name="last_name" type="text" value="{{$doctorDetail->last_name}}" />
                                            <x-jet-input-error for="last_name"></x-jet-input-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label for="last_name">Email</x-jet-label>
                                            <x-jet-input id="email" name="email" type="email" value="{{$doctorDetail->email}}" />
                                            <x-jet-input-error for="email"></x-jet-input-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-jet-label for="password">Password</x-jet-label>
                                            <x-jet-input id="password" name="password" type="password" value="" />
                                            <x-jet-input-error for="password"></x-jet-input-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="phone" class="control-label" value="{{ __('Phone') }}"/>
                                            <x-jet-input id="phone" name="phone" type="text" value="{{$doctorDetail->phone}}"/>
                                            <x-jet-input-error for="phone"></x-jet-input-error>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="qualification" class="control-label" value="{{ __('Qualification') }}"/>
                                            <x-jet-input id="qualification" name="qualification" type="text" value="{{$doctorDetail->qualification}}"/>
                                            <x-jet-input-error for="qualification"></x-jet-input-error>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label class="control-label" value="{{ __('Gender') }}"/>

                                            <select
                                                class="form-control select2 {{ $errors->has('gender') ? 'text-red-500' : '' }}"
                                                id="gender"
                                                name="gender" required >
                                                @foreach($userGender as $userGenderKey => $userGender)

                                                    <option
                                                        {{ $doctorDetail->gender == $userGenderKey ? 'selected' : '' }} value="{{ $userGenderKey }}">{{ $userGender }}</option>
                                                @endforeach
                                            </select>
                                            <x-jet-input-error for="gender"></x-jet-input-error>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <x-jet-label for="speciality">Speciality</x-jet-label>
                                            <select class="form-control select2" name="speciality" id="speciality"
                                                    required
                                                    multiple>
                                                @foreach($specialities as $speciality)
                                                    <option {{ $doctorDetail->speciality == $speciality->id ? 'selected' : '' }} value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-jet-input-error for="speciality"></x-jet-input-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <x-jet-label for="address" value="{{ __('Address') }}"/>
                                            <textarea class="form-control" id="address" name="address"
                                                      rows="5">{{$doctorDetail->address}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group float-right">
                                            <button type="submit"
                                                    class="btn btn-hero btn-noborder btn-primary min-width-125 js-event-save">
                                                Update
                                            </button>
                                            <a href="{{ route('backend.doctor.index')}}"
                                               class="btn btn-hero btn-noborder btn-alt-secondary">
                                                Cancel
                                            </a>
                                        </div>
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

    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js')}}"></script>
@endsection
