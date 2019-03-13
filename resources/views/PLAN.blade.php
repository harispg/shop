@extends('master')

@section('content')
	<div class="row">
	<div class="col col-md-6 offset-1">
		<h3>Tasks:</h3>
		<p><strike>Figure out parts of frontend html</strike></p>
		<p>Implement permissions</p>
		<p>Implement custom thumbnail creation</p>
		<p>Article pictures should be clickable</p>
		<p>Implement tag system</p>
		<p>Make front end messages dynamic</p>
		<p>Implement Discounts API</p>
		<p>Implement Orders API</p>
	</div>
	<div class="col col-md-5">
		<h3>In Progress:</h3>
		<p>Implement permissions:</p>
		<p>articles.create, articles.modify, categories.create, categories.modify, workWithRoles,
		workWithPermissions, editApearance, workWithUsers, comments.delete, workWithPhotos.</p>
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

