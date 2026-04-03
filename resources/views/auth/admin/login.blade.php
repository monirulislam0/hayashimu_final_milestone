@section('title')
    Nutrimart | Login
@endsection
<x-admin-auth-layout>
    <section id="auth-login" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-login -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">Admin Login</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="d-flex flex-md-row flex-column justify-content-around">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="divider">
                                        <div class="divider-text text-uppercase text-muted"><small>Login with
                                                email</small>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('admin.login') }}">
                                        @csrf
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="email">Email address</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email address" value="{{ old('email') }}" required autofocus autocomplete="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-bold-600" for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="current-password">
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                            <div class="text-left">
                                                <div class="checkbox checkbox-sm">
                                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                                    <label class="checkboxsmall" for="remember_me"><small>Keep me logged
                                                            in</small></label>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="card-link"><small>Forgot Password?</small></a>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </form>
                                    <hr>
                                    {{--                                    <div class="text-center"><small class="mr-25">Don't have an account?</small><a href="auth-register.html"><small>Sign up</small></a></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <div class="card-content">
                            <img class="img-fluid" src="{{ asset('assets/images/pages/login.png') }}" alt="branding logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-auth-layout>
