<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Informe</title>
	<style type="text/css">
    body {
      color: black;
      background: none;
			font-family: Liberation Serif, serif;
			font-size: 11pt;
    }
    a { text-decoration: underline;}
		p { margin-bottom: 0.25cm; line-height: 120% }
		h1 {
			color: #000000;
			font-family: FreeSans, sans-serif;
			font-size: 20pt;
			text-decoration: underline;
			text-align: center;
      margin-bottom: 0;
		}
		header, div {
			margin-bottom: 2em;
		}
    table {
      width: 100%;
      border: 1px;
      border-collapse: collapse;
    }
		.hr {
			border-bottom: solid thin;
		}

		footer {
			position: absolute;
			bottom: 0;
	    left: 0;
	    right: 0;
			text-align: center;
		}

		.entregadoRecibido {
			position: absolute;
			bottom: 100px;
	    left: 0;
	    right: 0;
		}

    .text-center {
      text-align: center;
    }
    .text-right {
      text-align: right;
    }
		.direccion {
			color: #6666ff;
			text-align: center;
      display: block;
		}

		.tablaDatosPersonales td {
			width: 25%;
		}

		.borde {
	    border: 1px solid black;
		}

		.negrita {
			font-weight: bold;
		}
	</style>
</head>
<body style="border: none; padding: 0" onload="window.print()">
	<header>
    <table>
      <tr>
        <td></td>
        <td>
	        <h1>Reciclanet</h1>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <a href="www.reciclanet.org" class="direccion">www.reciclanet.org</a>
        </td>
      </tr>
      <tr>
        <td>
          Registro Nº B8967/ 01
        </td>
        <td class="col-sm-4 text-center">
          Triodos Bank 1491-0001-27-2157938024
        </td>
        <td class="col-sm-4 text-right">
          NIF: G95138475
        </td>
      </tr>
			<tr class="hr"><td colspan="3"></td></tr>
      <tr>
        <td>
          Asociación Educativa Reciclanet
        </td>
        <td class="text-center">
          Reciclanet Hezkuntza Elkartea
        </td>
        <td class="text-right">
          <a href="mailto:reciclanet@reciclanet.org">reciclanet@reciclanet.org</a>
        </td>
      </tr>
      <tr>
        <td>Ribera de Axpe 11, D-2, L-105 48950</td>
        <td></td>
        <td class="text-right">Tel : 94-657.37.4</td>
      </tr>
      <tr>
        <td>Erandio-Bizkaia</td>
      </tr>
    </table>
	</header>
	<div style="padding: 1em;">
		<table class="tablaDatosPersonales">
			<tr>
				<td colspan="2">
					<h2>Colaborador</h2>
				</td>
				<td colspan="2" style="text-align: right;">Fecha: {{ $lote->created_at->format('d/m/Y') }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">CONTACTO</td>
				<td colspan="3">{{ (isset($lote->persona_id)) ? $responsable->nombre : $responsable->razon_social }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">DIRECCIÓN</td>
				<td colspan="3"> {{ $responsable->direccion }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">CP</td>
				<td>{{ $responsable->cp }}</td>
				<td class="negrita">POBLACIÓN</td>
				<td>{{ $responsable->poblacion }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">TELÉFONO 1</td>
				<td>{{ $responsable->telefono_1 }}</td>
				<td class="negrita">TELÉFONO 2</td>
				<td>{{ $responsable->telefono_2 }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">PÁGINA WEB</td>
				<td colspan="3">{{ $responsable->pagina_web }}</td>
			</tr>
			<tr class="borde">
				<td class="negrita">EMAIL</td>
				<td colspan="3">{{ $responsable->email }}</td>
			</tr>
		</table>
	</div>

	<div>
		<table>
			<tr>
				<th>Material</th>
				<th>¿Borrado Seguro?</th>
				<th>Cantidad</th>
			</tr>
			<tr class="hr"><td colspan="3"></td></tr>
			@foreach ($lote->materiales as $material)
				<tr>
					<td class="text-center">{{ $material->material->nombre }}</td>
					<td class="text-center">{{ ($material->borrado_seguro)? 'Sí' : 'No' }}</td>
					<td class="text-center">{{ $material->cantidad }}</td>
				</tr>
				<tr class="hr"><td colspan="3"></td></tr>
			@endforeach
		</table>
	</div>

	<div class="entregadoRecibido">
		<table>
			<tr>
				<td>Recibido por:</td>
				<td class="text-right">Entregado por:</td>
		</table>
	</div>

	<footer>
		<span>Elaborado con Software Libre por Reciclanet</span>
	</footer>
</body>
</html>
