@extends('master')

@section('content')
	
	<ul class="">
	  <li>
		  Create users table and all possible getters, 
		  setters, roles, permissions, logins, socialite
	  </li>
	  <li>Create articles and all possible getters setters relationships with user and photos
	  		<ul>
	  			<li>Name</li>
	  			<li>Price</li>
	  			<li>Rating</li>
	  			<li>Quantity</li>
	  			<li>Description</li>
	  			<li>Photos via Photo Eloquent model</li>
	  			<li>Color</li>
	  			<li>Size</li>
	  			<li>Weight</li>
	  			<li>Packing quantity</li>
	  		</ul>
	  </li>
	  <li>Comments</li>
	  <li>Orders</li>
	  <li>Items</li>
	  <li>Queue emails for verification and others</li>
	</ul>


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
