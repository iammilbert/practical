@include('layout/navbar')
@include('header')

<body>
  <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Welcome, {{ session('name') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
  </div>
</body>
