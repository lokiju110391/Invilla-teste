<!doctype html>

<html lang="en_US"> 

	<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Platta Investimentos">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap core CSS -->
        <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">

        <!-- Bootstrap core JS -->
        <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.js') }}"></script>

        <style>
	      	
	      	.bd-placeholder-img {
	        	font-size: 1.125rem;
	        	text-anchor: middle;
	        	-webkit-user-select: none;
	        	-moz-user-select: none;
	        	user-select: none;
	      	}

	      	@media (min-width: 768px) {
	        	.bd-placeholder-img-lg {
	          		font-size: 3.5rem;
	        	}
	      	}

	      	body {
			  	background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
			}

			.container {
			  	max-width: 960px;
			}

			.pricing-header {
			  	max-width: 700px;
			}

	    </style>


    </head>


    <body>
    	
    	<div class="container py-3">

	    	<header>
			    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
			      	
			      	<a href="/" class="d-flex align-items-center text-dark text-decoration-none">		        
			        	<span class="fs-4">Invillia Test</span>
			      	</a>

			      	<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
			        	<a class="me-3 py-2 text-dark text-decoration-none" href="{{ url('/people') }}">People</a>
			        	<a class="me-3 py-2 text-dark text-decoration-none" href="{{ url('/shiporders') }}">Ship Orders</a>
			        	<a class="me-3 py-2 text-dark text-decoration-none" href="{{ url('/users') }}">Users</a>
			      	</nav>

			    </div>
			
			</header>

			<main>
    			@yield('content') 
    		</main>

    		<footer class="pt-4 my-md-5 pt-md-5 border-top">
			    <div class="row">		      
			      	<div class="col-6 col-md">
			        	<h5>About</h5>
			        	<ul class="list-unstyled text-small">
			          		<li class="mb-1"><a class="link-secondary text-decoration-none" href="{{ url('/people') }}">People</a></li>
			          		<li class="mb-1"><a class="link-secondary text-decoration-none" href="{{ url('/shiporders') }}">Ship Orders</a></li>
			          		<li class="mb-1"><a class="link-secondary text-decoration-none" href="{{ url('/users') }}">Users</a></li>
			        	</ul>
			      	</div>
			    </div>
		  	</footer>

    	</div>



    </body>

</html>