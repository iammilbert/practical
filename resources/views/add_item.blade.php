@include('layout/navbar');
@include('header');

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Item</h4>
                  <form class="was-validated" method="POST" action="{{ route('items.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Item Name</label>
					    <input type="hidden" name="user_id" class="form-control" value="{{ session('user_id') }}" required>

                            <input autocomplete="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
					   <textarea autocomplete="description" class="form-control" value="{{ old('description') }}" name="description" required></textarea>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

					<div class="form-group mt-2">
						<input type="submit" name="phone" class="form-control btn btn-primary" value="Add Item">
					</div>

                    </form>
                </div>
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
        })
    @endif
</script>


</body>
