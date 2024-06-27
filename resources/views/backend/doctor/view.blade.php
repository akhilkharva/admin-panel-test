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
        @slot('title') View Doctor @endslot
        @slot('li_1') Doctor @endslot
        @slot('li_2') View Doctor @endslot
    @endcomponent
    <!-- Start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">
                        <div class="tab-pane" id="basic-info">
                            <h4 class="card-title">View Doctor</h4>
                            <p class="card-title-desc">Shows all the information about doctor</p>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="first_name">First Name</x-jet-label>
                                        <x-jet-input id="first_name" name="first_name" type="text" value="{{$doctorDetail->first_name}}" disabled/>
                                        <x-jet-input-error for="first_name"></x-jet-input-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="last_name">Last Name</x-jet-label>
                                        <x-jet-input id="last_name" name="last_name" type="text" value="{{$doctorDetail->last_name}}" disabled/>
                                        <x-jet-input-error for="last_name"></x-jet-input-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="last_name">Email</x-jet-label>
                                        <x-jet-input id="email" name="email" type="email" value="{{$doctorDetail->email}}" disabled/>
                                        <x-jet-input-error for="email"></x-jet-input-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="password">Password</x-jet-label>
                                        <x-jet-input id="password" name="password" type="password" value="secret" disabled/>
                                        <x-jet-input-error for="password"></x-jet-input-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-jet-label for="phone" class="control-label" value="{{ __('Phone') }}"/>
                                        <x-jet-input id="phone" name="phone" type="text" value="{{$doctorDetail->phone}}" disabled/>
                                        <x-jet-input-error for="phone"></x-jet-input-error>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-jet-label for="qualification" class="control-label" value="{{ __('Qualification') }}"/>
                                        <x-jet-input id="qualification" name="qualification" type="text" value="{{$doctorDetail->qualification}}" disabled/>
                                        <x-jet-input-error for="qualification"></x-jet-input-error>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <x-jet-label class="control-label" value="{{ __('Gender') }}"/>

                                        <select
                                            class="form-control select2 {{ $errors->has('gender') ? 'text-red-500' : '' }}"
                                            id="gender"
                                            name="gender" required disabled>
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
                                                multiple disabled>
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
                                                  rows="5" disabled>{{$doctorDetail->address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mt-4 mt-md-0">
                                    <h5 class="font-size-14">Doctor Images :</h5>
                                    {{--@foreach($doctorDetail->productImages as $productImage)

                                        <img class="rounded-circle avatar-xl ml-4" alt="200x200"
                                             src="{{ URL::asset('/storage/images/products/'.$productImage->image)}}"
                                             data-holder-rendered="true" title="{{$productImage->image}}">

                                    @endforeach--}}
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group float-right">
                                    <a href="{{ route('backend.doctor.index')}}"
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
