@extends('app')

@section('content')
<nav id="slide-menu" class="slide-menu" role="navigation">

	@include('partials.main-nav')


	<div class="slide-docs-nav">
		<h2>Documentation</h2>
		{!! $index !!}
	</div>

</nav>

<div class="docs-wrapper container">

	<section class="sidebar">
		{!! $index !!}
	</section>

	

	<article>
		{!! $content !!}
	</article>
</div>
@endsection
