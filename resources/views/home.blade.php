@include('header');

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">User Registration</h4>
                  <form class="was-validated" method="POST" action="{{ route('auths.register') }}">

                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input autocomplete="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <i class="fa fa-envelope"></i>
                            <input autocomplete="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <i class="fa fa-lock"></i>
                            <input autocomplete="password" type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter your password</div>
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input autocomplete="password" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Confirm password</div>
                        </div>

                <div class="form-group mt-2">
                    <input type="submit" name="phone" class="form-control btn btn-primary" value="Create Account">
                </div>

                    </form>
                </div>
            </div>
            <div class="text-center mt-2">
                Already Registered? <a href="{{ route('auths.loginpage') }}">Login here</a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            Swal.fire({
                title: 'FAILED',
                text: '{{ $error }}',
                icon: 'error',
                timer: 50000
            });
        @endforeach
    @endif
</script>



<script>
    @if(session('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 5000
        }).then(() => {
            window.location.href = "{{ route('auths.loginpage') }}";
        });
    @endif
</script>


<script>
    @if(session('error'))
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                timer: 5000
            });
    @endif
</script>


</body>
