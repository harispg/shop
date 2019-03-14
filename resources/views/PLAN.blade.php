@extends('master')

@section('content')
	<div class="row">
	<div class="col col-md-6 offset-1">
		<h3>Tasks:</h3>
		<p><strike>Figure out parts of frontend html</strike></p>
		<p><strike>Implement permissions</strike></p>
		<p>Implement custom thumbnail creation</p>
		<p>Article pictures should be clickable</p>
		<p>Implement tag system</p>
		<p>Make front end messages dynamic</p>
		<p>Implement Discounts API</p>
		<p>Implement Orders API</p>
	</div>
	<div class="col col-md-5">
		<h3>In Progress:</h3>
		<p>Implement custom thumbnail creation. I need to have the ability to choose thumbnail dimmension needed for website.</p>
		<ul>Thumbnails needed:
			<li>Article portrait for articles index page and also for featured products</li>
			<li>Category portrait for categories on home page</li>
			<li>Big photo for homepages carusel</li>
			<li>Medium big photo for special offers</li>
			<li>Avatars</li>
			<li>Cart icons small</li>
		</ul>
		
	</div>
	

</div>

@endsection

@section('script')

@include('flash')

@endsection

{{-- Koje sve tipove korisnika cemo imati. Imacemo:
 
  - jednog superkorisnika moze sve,da brise i pravi artikle, dodjeljuje privilegije korisnicima, dodaje slike, imace pristup dashboardu
  - Administratore moze sve sto i super osim da daje popuste, ogranicen dashboard, bez uvida u sve artikle
  - Editore moze samo da mijenja slike i tekst artikala
  - kupce mogu da kupuju
  - Goste, mogu samo da gledaju
  -
--}}

