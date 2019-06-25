@extends('master')

@section('content')

{{-- @include('unify.revolutionSlider') --}}

@include('unify.categories', ['categories' => App\Category::all()])

@include('unify.featuredProducts')

@include('unify.promoBlock')

@endsection

@if(session('verified'))
	@section('script')
	<script type="text/javascript">
		swal.fire({
		  type: 'success',
		  title: 'Email verified',
		  text: 'You have verified your email successfuly',
		  showConfirmButton: false,
		  timer: 1500
		});	
	</script>
	@endsection
@endif
