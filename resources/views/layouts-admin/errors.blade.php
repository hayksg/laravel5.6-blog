<ul class="list-unstyled text-danger">
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>