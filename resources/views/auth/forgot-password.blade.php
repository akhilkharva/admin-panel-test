<x-master-without-nav-layout>
@section('title')
    Recover Password
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
                                                    <a href="{{url('index')}}" class="logo"><img src="{{ URL::asset('/assets/images/logo-dark.png')}}" height="20" alt="logo"></a>
                                                </div>

                                                <h4 class="font-size-18 mt-4">Reset Password</h4>
                                                <p class="text-muted">Reset your password to Nazox.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <div class="alert alert-success mb-4" role="alert">
                                                    Enter your Email and instructions will be sent to you!
                                                </div>

                                                <form method="POST" action="/forgot-password">
                                                    @csrf

                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-mail-line auti-custom-input-icon"></i>
                                                        <x-jet-label value="Email" />
                                                        <x-jet-input type="email" name="email" :value="old('email')" required autofocus placeholder="Enter email" />
                                                        <x-jet-input-error for="email"></x-jet-input-error>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <x-jet-button>
                                                            {{ __('Reset') }}
                                                        </x-jet-button>
                                                    </div>

                                                </form>
                                                <div class="mt-5 text-center">
                                                    <p>Don't have an account ? <a href="{{url('login')}}" class="font-weight-medium text-primary"> Login</a> </p>
                                                    <p>© <script>document.write(new Date().getFullYear())</script> Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                                </div>
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
