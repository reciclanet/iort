<h3>Lote material</h3>
<div>
  <table class="table">
    <thead>
      <tr>
        <th>Material</th>
        <th>Cantidad</th>
        <th>¿Borrado Seguro?</th>
        @if (isset($edicion) && $edicion)
          <th></th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach ($lote->materiales as $loteMaterial)
        <tr id="loteMaterial{{$loteMaterial->material_id}}">
          <td>{{ $loteMaterial->material->nombre }}</td>
          <td>{{ $loteMaterial->cantidad }}</td>
          <td>{{ ($loteMaterial->borrado_seguro)? 'Sí' : 'No' }}</td>
          @if (isset($edicion) && $edicion)
            <td>
              <button type="submit" class="btn btn-warning" value="{{$loteMaterial->material_id}}">Editar</button>
              <button type="submit" class="btn btn-danger delete-loteMaterial" value="{{$loteMaterial->material_id}}">Eliminar</button>
            </td>
          @endif
        </tr>
      @endforeach
    </tbody>
    @if (isset($edicion) && $edicion)
      <tfoot>
        <tr>
          <td>{{ Form::select('material_id', $materiales, null, ['class'=>"form-control", 'placeholder' => ''])}}</td>
          <td>{{ Form::number('cantidad', null, ['class' =>"form-control"] )}}</td>
          <td>{{ Form::checkbox('borrado_seguro', 1, null)}}</td>
          <td><button type="submit" class="btn btn-success">Añadir</button></td>
        </tr>
      </tfoot>
    @endif
  </table>
</div>

<script>
jQuery(document).ready(function($) {

    var url = "/lotes/{{$lote->id}}/" ;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data.id);
            $('#task').val(data.task);
            $('#description').val(data.description);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-loteMaterial').click(function(){
      event.preventDefault();

        var loteMaterial_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + 'loteMaterial/' + loteMaterial_id,
            _token: '{{ csrf_token() }}',
            success: function (data) {
                if (data == 'success'){
                  $("#loteMaterial" + loteMaterial_id).remove();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            task: $('#task').val(),
            description: $('#description').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + task_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record

                    $("#task" + task_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>
