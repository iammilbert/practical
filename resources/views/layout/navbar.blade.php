<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="{{ route('auths.dashboard') }}" style="font-weight:bolder">PRACTICAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('auths.dashboard') }}" >Home <span class="sr-only">(current)</span></a>
      </li>
	 
	 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Items
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('items.add') }}">Add Item</a>
		 <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('items.index') }}">Registered Items</a>
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Action
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('auths.loginpage') }}">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>