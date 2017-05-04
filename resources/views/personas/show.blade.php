<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  {{ $persona }}
  {{ $persona->tipoConocido->nombre }}
  @if ($persona->sexo)
    {{ $persona->sexo->nombre }}
  @endif
</body>
</html>
