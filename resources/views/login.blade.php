@include('header');

<body>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Login</h4>
					<form class="was-validated" method="POST" action="{{ route('auths.login') }}">
					@csrf
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
						<div class="valid-feedback"></div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
						<div class="valid-feedback"></div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group mt-2">
						<button type="submit" name="phone" value="login" class="form-control btn btn-primary">Login</button>
					</div>
					</form>
				</div>
			</div>
			<div class="text-center mt-2">
				Not Registered yet? <a href="{{ route('auths.home') }}">Register here</a>
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
