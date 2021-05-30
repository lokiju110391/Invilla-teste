@extends('layouts.default')     

@section('content')

<section>
	
	<form id="form-input" name="form-input" method="POST" action="{{ url('/save-file') }}" enctype="multipart/form-data">  	

		@csrf

		<h2>Subimit your file here</h2>

		<br>		
	  	<div class="form-group">
	    	<label>People File to process</label>
	    	<input type="file" class="form-control" id="people_file_to_process" name="people_file_to_process" placeholder="Choose a File" accept="text/xml" required>
	  	</div>
	  	<br>		
	  	<div class="form-group">
	    	<label>Ship Orders File to process</label>
	    	<input type="file" class="form-control" id="shiporders_file_to_process" name="shiporders_file_to_process" placeholder="Choose a File" accept="text/xml" required>
	  	</div>
	  	<br>
	  	<button type="submit" class="btn btn-primary">Submit</button>

	</form>

</section>


@endsection 