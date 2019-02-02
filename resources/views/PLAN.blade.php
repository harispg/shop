@extends('master')

@section('content')
	
	<ul class="">
	  <li>
		  Create users table and all possible getters, 
		  setters, roles, permissions, logins, socialite
	  </li>
	  <li>Create articles and all possible getters setters relationships with user and photos</li>
	  <li>Comments</li>
	  <li>Orders</li>
	  <li>Items</li>
	  <li>Queue emails for verification and others</li>
	</ul>
<script src="https://apis.google.com/js/platform.js" async defer></script>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>

@endsection

{{-- Koje sve tipove korisnika cemo imati. Imacemo:
 
  - jednog superkorisnika moze sve,da brise i pravi artikle, dodjeljuje privilegije korisnicima, dodaje slike, imace pristup dashboardu
  - Administratore moze sve sto i super osim da daje popuste, ogranicen dashboard, bez uvida u sve artikle
  - Editore moze samo da mijenja slike i tekst artikala
  - kupce mogu da kupuju
  - Goste, mogu samo da gledaju
  -
--}}
