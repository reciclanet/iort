@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endpush

@section('content')
  <h1>Personas</h1>
  <a href="{{ url('personas/create')}}" class="btn btn-primary">Nueva</a>

  <div>
    <table class="table table-bordered" id="personas-table">
        <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido 1</th>
              <th>Apellido 2</th>
              <th>Población</th>
              <th>Teléfono 1</th>
              <th>Teléfono 2</th>
            </tr>
        </thead>
    </table>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script>
    $(function() {
        $('#personas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('/datatables/personas') !!}',
            columns: [
                { data: 'nombre', name: 'nombre' },
                { data: 'apellido_1', name: 'apellido_1' },
                { data: 'apellido_2', name: 'apellido_2' },
                { data: 'poblacion', name: 'poblacion' },
                { data: 'telefono_1', name: 'telefono_1' },
                { data: 'telefono_2', name: 'telefono_2' },
            ],
            language: {
                "url": "{{ asset('css/lang/datatables_es.json') }}"
            }
        });
    });
  </script>
@endpush
