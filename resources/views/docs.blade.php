@extends('app')

@section('content')
<nav id="slide-menu" class="slide-menu" role="navigation">

	<div class="brand">
		<a href="/">
			<div id="logo" style="display: block;">
               <svg version="1.1" id="logoTop" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="440px" height="440px" viewBox="0 0 440 440" enable-background="new 0 0 440 440" xml:space="preserve" style="display: inline;"> <g id="sign"> <g> <path fill-rule="evenodd" clip-rule="evenodd" fill="#ffffff" d="M350.5,191.719c0-34.448-27.564-62.374-61.565-62.374 c-16.238,0-30.996,6.379-41.993,16.788l-0.039-0.04L221,172.335l-24.398-24.719l-0.005-0.005l-43.531-44.103l-43.523,44.095 c-0.007,0.006-0.013,0.013-0.02,0.02l-1.491,1.511l0.036,0.036C97.796,160.315,91.5,175.269,91.5,191.719 c0,34.447,27.564,62.373,61.565,62.373c16.237,0,30.997-6.379,41.997-16.784l0.036,0.036L221,211.102l49.779,50.433 l-54.025,52.778l19.107,20.194l59.574-61.166l37.023-37.511l0.018-0.017l1.492-1.513l-0.035-0.036 C344.204,223.121,350.5,208.168,350.5,191.719z M177.655,215.951c0,0.001-0.001,0.002-0.002,0.002l-0.835,0.846l-0.02-0.02 c-6.128,5.797-14.352,9.351-23.398,9.351c-18.944,0-34.301-15.559-34.301-34.751c0-9.165,3.508-17.496,9.23-23.705l-0.02-0.02 l0.835-0.846c0.001-0.001,0.002-0.002,0.003-0.003l24.253-24.571l24.253,24.571l0.003,0.002l24.252,24.571L177.655,215.951z M313.691,215.781l-0.818,0.829c-0.012,0.012-0.023,0.024-0.035,0.036l-24.236,24.555l-48.51-49.145l24.241-24.558 c0.009-0.01,0.019-0.02,0.028-0.029l0.822-0.833l0.02,0.02c6.129-5.797,14.352-9.351,23.398-9.351 c18.943,0,34.301,15.559,34.301,34.751c0,9.165-3.508,17.496-9.23,23.705L313.691,215.781z"></path> </g> </g> </svg>         
		<div class="logoLine"><strong>pseudo</strong>agentur</div>                   
                        
    </div>
		</a>
	</div>

	<ul class="slide-main-nav">
		<li><a href="/">Home</a></li>
		@include('partials.main-nav')
	</ul>

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
