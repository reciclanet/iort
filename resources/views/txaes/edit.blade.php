@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Marcar material como Txae</div>
                @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="cerrar">&times;</a>
                    {{ Session::get('message') }}
                  </div>
                  <script>
                    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                    $(".alert-success").slideUp(500);
                  });
                  </script>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('TxaeController@update') }}">
                      <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                            <label for="codigo" class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input id="codigo" type="codigo" class="form-control" name="codigo" value="{{ old('codigo') }}" required autofocus>

                                @if ($errors->has('codigo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Marcar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
