<x-master-without-nav-layout>
    {{--@extends('layouts.master-without-nav')--}}
    @section('title')
        Register
    @endsection
    @section('body')
        <body class="auth-body-bg">
        @endsection
        @section('content')
            <div class="home-btn d-none d-sm-block">
                <a href="{{url('index')}}"><i class="mdi mdi-home-variant h2 text-white"></i></a>
            </div>
            <div>
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-4">
                            <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                                <div class="w-100">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-9">
                                            <div>
                                                <div class="text-center">
                                                    <div>
                                                        <a href="{{url('index')}}" class="logo"><img
                                                                src="{{ URL::asset('/assets/images/logo-dark.png')}}"
                                                                height="20" alt="logo"></a>
                                                    </div>

                                                    <h4 class="font-size-18 mt-4">Register account</h4>
                                                    <p class="text-muted">Get your free Nazox account now.</p>
                                                </div>

                                                <div class="p-2 mt-5">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf
                                                        <div class="form-group auth-form-group-custom mb-4">
                                                            <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                            <x-jet-label value="{{ __('Name') }}"/>

                                                            <x-jet-input
                                                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                type="text" name="name"
                                                                :value="old('name')" required autofocus
                                                                autocomplete="name" placeholder="Name"/>
                                                            <x-jet-input-error for="name"></x-jet-input-error>
                                                        </div>

                                                        <div class="form-group auth-form-group-custom mb-4">
                                                            <x-jet-label value="{{ __('E-Mail Address') }}"/>
                                                            <i class="ri-mail-line auti-custom-input-icon"></i>

                                                            <x-jet-input
                                                                class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                type="email" name="email" placeholder="Enter email"
                                                                :value="old('email')" required/>
                                                            <x-jet-input-error for="email"></x-jet-input-error>
                                                        </div>


                                                        <div class="form-group auth-form-group-custom mb-4">
                                                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                            <x-jet-label value="{{ __('Password') }}"/>

                                                            <x-jet-input
                                                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                                type="password"
                                                                name="password" required autocomplete="new-password"
                                                                placeholder="Enter password"/>
                                                            <x-jet-input-error for="password"></x-jet-input-error>
                                                        </div>

                                                        <div class="form-group auth-form-group-custom mb-4">
                                                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                            <x-jet-label value="{{ __('Confirm Password') }}"/>

                                                            <x-jet-input class="form-control" type="password"
                                                                         name="password_confirmation" required
                                                                         autocomplete="new-password"
                                                                         placeholder="Enter password"/>
                                                        </div>

                                                        <div class="text-center">
                                                            <x-jet-button>
                                                                {{ __('Register') }}
                                                            </x-jet-button>
                                                        </div>

                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">By registering you agree to the Nazox <a
                                                                    href="#" class="text-primary">Terms of Use</a></p>
                                                        </div>

                                                    </form>
                                                </div>

                                                <div class="mt-5 text-center">
                                                    <p>Don't have an account ? <a href="{{url('login')}}"
                                                                                  class="font-weight-medium text-primary">
                                                            Login</a></p>
                                                    <p>
                                                        <script>document.write(new Date().getFullYear())</script>
                                                        © Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                                        by Themesdesign
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="authentication-bg">
                                <div class="bg-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
</x-master-without-nav-layout>
