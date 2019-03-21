@extends('admin.master')

@section('content')
	<div class="row">
	<div class="col col-md-6 offset-1">
		<h3>Tasks:</h3>
		<p><strike>Figure out parts of frontend html</strike></p>
		<p><strike>Implement permissions</strike></p>
		<p><strike>Implement custom thumbnail creation</strike> <strong>On hold</strong></p>
		<p><strike>Article pictures should be clickable</strike></p>
		<p>Make admin page for users</p>
		<p>Implement tag system</p>
		<p>Make front end messages dynamic</p>
		<p>Implement Discounts API</p>
		<p>Implement Orders API</p>
		<p>Schedule once a month check to see if there are useres that havent been active for more than two years, and if so, delete their accounts but a month before alert them about that action. Also once a month check if there are tags that don't have articles attached to them and if yes, delete them. Schedule something interesting, like new discounts and actions</p>
	</div>
	<div class="col col-md-5">
		<h3>In Progress:</h3>
		<p>Implement tag system <br />
			Tag has a name, <br>
			tag can belong to many articles and articles can have many tags, <br>
			user shuold be able to add tags during creation of article, and change during edit, <br> 
			Tags sholud be visible and clickable to all users, <br>
			Click on a tag should lead to a page with all articles with that tag.
		</p>

		{{-- Making admin page for users:<br />
			I need a table with roles and superAdmin checkboxes
			Functionality:
			Give and take away roles,
			Give or take superAdmin ability,
			Ban user,
			Give discount
			check orders
			check total spent
			check total discounts
			check 
		</p> --}}
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

