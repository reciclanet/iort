<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>Personas</h1>
  <ul>
    @foreach ($personas as $persona)
      <li><a href="/personas/{{ $persona->id }}">{{ $persona->nombre }}</a></li>
    @endforeach
  </ul>
</body>
</html>
