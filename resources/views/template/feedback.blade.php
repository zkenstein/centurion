@if(session('success'))
	<div class="col-12">
	    <div class="alert btn-success">{!! session('success') !!}</div>
	</div>
@endif
@if(session('error'))
	<div class="col-12">
	    <div class="alert btn-dangers">{!! session('error') !!}</div>
	</div>
@endif
@if(count($errors)>0)
	<div class="col-12">
	    <div class="alert btn-dangers">
		    <p>Perhatian.</p>
		    <ul>
		    	@foreach($errors->all() as $error)
		    		<li>{!! $error !!}</li>
		    	@endforeach
		    </ul>
	    </div>
	</div>
@endif