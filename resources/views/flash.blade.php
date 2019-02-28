@if(session()->has('flash_message'))
  @if(session('flash_message.key')==null)
    <script type="text/javascript">
    swal.fire({
          title: "{!!session('flash_message.title')!!}",
          html: "{!!session('flash_message.message')!!}",
          type: "{!!session('flash_message.level')!!}",
          showConfirmButton: false,
          timer: 2500
          });
    </script>
  @else
    <script type="text/javascript">
    swal.fire({
          title: "{!!session('flash_message.title')!!}",
          html: "{!!session('flash_message.message')!!}",
          type: "{!!session('flash_message.level')!!}",
          confirmButtonText: 'Ok'
          });
    </script>
  @endif
@endif
