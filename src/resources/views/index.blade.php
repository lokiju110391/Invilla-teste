@extends('layouts.default')     

@section('content')

<section>
	
	<form  id="form-input" name="form-input" method="POST" action="{{ url('/save-file') }}" enctype="multipart/form-data">  	

		<h2>Subimit your file here</h2>

		<br>		
	  	<div class="form-group">
	    	<label>File to process</label>
	    	<input type="file" class="form-control" id="file_to_process" name="file_to_process" placeholder="Choose a File" accept="text/xml" required>
	  	</div>
	  	<br>
	  	<button type="submit" class="btn btn-primary">Submit</button>

	</form>

</section>


@endsection 