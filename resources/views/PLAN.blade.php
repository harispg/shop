@extends('master')

@section('content')
	<div class="row">
	<div class="col col-md-6 offset-1">
		<h3>Tasks:</h3>
		<p><strike>Figure out parts of frontend html</strike></p>
		<p><strike>Implement permissions</strike></p>
		<p><strike>Implement custom thumbnail creation</strike> <strong>On hold</strong></p>
		<p><strike>Article pictures should be clickable</strike></p>
		<p>Implement tag system</p>
		<p>Make front end messages dynamic</p>
		<p>Implement Discounts API</p>
		<p>Implement Orders API</p>
	</div>
	<div class="col col-md-5">
		<h3>In Progress:</h3>
		<p>
			Issues with summernote, text floats up on page scrolling. <br />
			Show photos somewere when editing article. <br />
			
		</p>
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

