@if( Session::has('flash_ok') or Session::has('flash_error'))
  @if(Session::has('flash_ok'))
    <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="cerrar">&times;</a>
      {{ Session::get('flash_ok') }}
    </div>
  @endif
  @if(Session::has('flash_error'))
    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="cerrar">&times;</a>
      {{ Session::get('flash_error') }}
    </div>
  @endif
  <script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
  });
  </script>
@endif
