@section('title')
    Admin | Change Password
@endsection
<x-admin-auth-layout>
    <section id="auth-change-password" class="row flexbox-container">
        <div class="col-xl-8 col-11">
            <div class="card bg-authentication mb-0">
                <div class="row m-0">
                    <!-- left section-change password -->
                    <div class="col-md-6 col-12 px-0">
                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="text-center mb-2">
                                        <i class="bx bx-lock-alt mr-2"></i>Change Password
                                    </h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="bx bx-check-circle mr-2"></i>{{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="divider">
                                        <div class="divider-text text-uppercase text-muted"><small>Update your
                                                password</small>
                                        </div>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('admin.change.password') }}" id="changePasswordForm">
                                        @csrf
                                        
                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="old_password">
                                                <i class="bx bx-key mr-1"></i>Old Password
                                            </label>
                                            <div class="input-group">
                                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Enter your current password" required autocomplete="current-password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('old_password', 'old_password_eye')">
                                                        <i class="bx bx-hide" id="old_password_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('old_password')
                                                <div class="invalid-feedback d-block">
                                                    <i class="bx bx-error-circle mr-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="new_password">
                                                <i class="bx bx-lock mr-1"></i>New Password
                                            </label>
                                            <div class="input-group">
                                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter your new password" required autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password', 'new_password_eye')">
                                                        <i class="bx bx-hide" id="new_password_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('new_password')
                                                <div class="invalid-feedback d-block">
                                                    <i class="bx bx-error-circle mr-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                            <small class="text-muted">Password must be at least 8 characters long and different from old password</small>
                                        </div>

                                        <div class="form-group mb-50">
                                            <label class="text-bold-600" for="new_password_confirmation">
                                                <i class="bx bx-lock-open-alt mr-1"></i>Confirm New Password
                                            </label>
                                            <div class="input-group">
                                                <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" placeholder="Confirm your new password" required autocomplete="new-password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password_confirmation', 'new_password_confirmation_eye')">
                                                        <i class="bx bx-hide" id="new_password_confirmation_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('new_password_confirmation')
                                                <div class="invalid-feedback d-block">
                                                    <i class="bx bx-error-circle mr-1"></i>{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="show_all_passwords">
                                                <label class="custom-control-label" for="show_all_passwords">Show all passwords</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary glow w-100 position-relative">
                                            <i class="bx bx-refresh mr-2"></i>Change Password
                                        </button>
                                        
                                        <div class="text-center mt-2">
                                            <a href="{{ route('admin.dashboard') }}" class="card-link">
                                                <small><i class="bx bx-arrow-back mr-1"></i>Back to Dashboard</small>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section image -->
                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                        <div class="card-content">
                            <div class="text-center mb-3">
                                <i class="bx bx-shield-alt text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <h4 class="text-center mb-3">Secure Your Account</h4>
                            <p class="text-center text-muted">
                                Keep your admin account secure by regularly updating your password. 
                                Use a strong password that combines letters, numbers, and special characters.
                            </p>
                            <div class="text-center mt-3">
                                <div class="badge badge-light-primary p-2">
                                    <i class="bx bx-check-circle mr-1"></i>Encrypted & Secure
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePassword(inputId, eyeId) {
            const input = document.getElementById(inputId);
            const eye = document.getElementById(eyeId);
            
            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.remove('bx-hide');
                eye.classList.add('bx-show');
            } else {
                input.type = 'password';
                eye.classList.remove('bx-show');
                eye.classList.add('bx-hide');
            }
        }

        // Show/hide all passwords functionality
        document.getElementById('show_all_passwords').addEventListener('change', function() {
            const passwordInputs = ['old_password', 'new_password', 'new_password_confirmation'];
            const eyeIcons = ['old_password_eye', 'new_password_eye', 'new_password_confirmation_eye'];
            
            passwordInputs.forEach((inputId, index) => {
                const input = document.getElementById(inputId);
                const eye = document.getElementById(eyeIcons[index]);
                
                if (this.checked) {
                    input.type = 'text';
                    eye.classList.remove('bx-hide');
                    eye.classList.add('bx-show');
                } else {
                    input.type = 'password';
                    eye.classList.remove('bx-show');
                    eye.classList.add('bx-hide');
                }
            });
        });

        // Form validation
        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('new_password_confirmation').value;
            const oldPassword = document.getElementById('old_password').value;
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('New password and confirmation do not match!');
                return false;
            }
            
            if (newPassword === oldPassword) {
                e.preventDefault();
                alert('New password must be different from old password!');
                return false;
            }
            
            if (newPassword.length < 8) {
                e.preventDefault();
                alert('Password must be at least 8 characters long!');
                return false;
            }
        });
    </script>
</x-admin-auth-layout>
