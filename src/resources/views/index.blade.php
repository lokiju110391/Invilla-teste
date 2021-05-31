@extends('layouts.default')     

@section('content')

<section>
	
	@if (\Session::has('error'))
		<div class="alert alert-danger" role="alert">
			{{\Session::get('error')}}
		</div>
	@endif

	@if (\Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{\Session::get('success')}}
		</div>
	@endif

	<h2>Subimit your files here</h2>

	<form id="form-input" name="form-input" method="POST" action="{{ url('/save-file-people') }}" enctype="multipart/form-data">  	

		@csrf

		<br>		
	  	<div class="form-group">
	    	<label>People File to process</label>
	    	<input type="file" class="form-control" id="people_file_to_process" name="people_file_to_process" placeholder="Choose a File" accept="text/xml" required>
	  	</div>
	  	<br>
	  	<button type="submit" class="btn btn-primary">Submit People</button>
	  	<br>

	</form>

	<br>
	<br>
	<hr class="mt-2 mb-3"/>


	<form id="form-input" name="form-input" method="POST" action="{{ url('/save-file-orders') }}" enctype="multipart/form-data">  	
	  	
		@csrf

	  	<br>
	  	<div class="form-group">
	    	<label>Ship Orders File to process</label>
	    	<input type="file" class="form-control" id="shiporders_file_to_process" name="shiporders_file_to_process" placeholder="Choose a File" accept="text/xml" required>
	  	</div>
	  	<br>
	  	<button type="submit" class="btn btn-primary">Submit Ship Orders</button>
	  	<br>

	</form>

</section>


@endsection 