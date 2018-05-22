@extends('layouts.app')

@section('content')
  <h1>Labels</h1>

  <div>
    <div>
        {{ Form::open(array('url' => 'labels')) }}
        <div class="col-sm-10">
          {{ Form::label('codigo_desde', 'Página Web', ['class' =>"col-md-2"]) }}
          <div class="form-group col-md-10 {{ $errors->has('codigo_desde') ? 'error' : '' }}">
            {{ Form::text('codigo_desde', null, ['class' =>"form-control"] )}}
          </div>
        </div>
        <div class="col-sm-2">

          <a href="{{ url('labels/export')}}" class="btn btn-primary">Exportar</a>
          {{ Html::link('labels/export', 'Agregar paciente', array('class' => 'btn btn-default'                                   ), false)}}
          {{ Form::close() }}
          <input type="submit" name="Filtrar" class="button btn-success"> 
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
              <th>Nº</th>
              <th>Colaborador</th>
              <th>Fecha</th>
            </tr>
        </thead>
        @foreach ($materiales as $material)
          <tr>
            <td>
              {{ $material->codigo_material }}
            </td>
            <td>
              {{ isset($material->id_organizacion) ? $material->codigo_organizacion : 'Particular' }}
            </td>
            <td>
              {{ Carbon\Carbon::parse($material->fecha)->format('Ymd') }}
            </td>
          </tr>
        @endforeach
    </table>

    <?php echo $materiales->links(); ?>

  </div>
@endsection
