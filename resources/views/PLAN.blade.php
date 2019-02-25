@extends('master')

@section('content')
	
	<ul>
		<li>Create categories</li> {{-- Name, id,  Kateogrija moze da ima vise proizvoda, a proizvod pripada više kategorija od čega je jedna glavna --}}
		<li>Create comments</li>
		<li>Create tags</li>
		<li>Discounts</li>
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
