<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('administration/img/icons/icon-48x48.png')}}" />


	<title>Bibliothèque en ligne</title>

	<link rel="stylesheet" href="{{ asset('administration/css/app.css')}}">
	<link rel="stylesheet" href="{{ asset('administration/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap4.css">


       @yield('style')
   
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle"> Biliothèque en ligne</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('home') }}">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Acceuil</span>
            </a>
					</li>
					@guest
					@else
					
					
					   @if (Auth::user()->statut=="admin")
						
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('getutilisateur') }}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Utilisateurs</span>
            </a>
					</li>
					    
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('getlivre') }}">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Livre</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('liste_emprunts') }}">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Emprunt</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('statistique') }}">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistique</span>
            </a>
					</li>
					  
					    
					
					@endif 
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('mes_emprunts') }}">
				           <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Mes emprunts</span>
				        </a>
					</li>
					@endguest
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Se connecter</a>
						</li>
					   @else
						<li class="nav-item dropdown">
							<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" class="nav-link">
								<i class="ti-power-off"></i>
					
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
								<span class="d-none d-sm-inline-block">Se déconnecter</span>
							</a>
						</li>
					   @endguest
					
						
					</ul>
				</div>
			</nav>
			@if(session()->has('succes'))
			<div class="alert alert-success"id="message" role="alert">
			 <p class="text-center">{{session()->get('succes')}}</p>
			 </div>
			@endif
			@if(session()->has('message'))
			<div class="alert alert-danger "id="message" role="alert">
			<p class="text-center">{{session()->get('message')}}</p>
			</div>
			@endif
        @yield('content')

			
		</div>
	</div>
	<script src="{{ asset('administration/js/jquery.min.js') }}"></script>
	<script src="{{ asset('administration/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('administration/js/app.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 
    @yield('script')
    
</body>

</html>