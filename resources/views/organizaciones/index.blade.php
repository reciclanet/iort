@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endpush

@section('content')
  <h1>Organizaciones</h1>
  <a href="{{ url('organizaciones/create')}}" class="btn btn-primary">Nueva</a>

  <div>
    <table class="table table-bordered" id="organizaciones-table">
        <thead>
            <tr>
              <th>Razón Social</th>
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
        $('#organizaciones-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! url('/datatable/organizaciones') !!}',
            columns: [
                { data: 'razon_social', name: 'razon_social' },
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
