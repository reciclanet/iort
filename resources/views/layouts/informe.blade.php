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
			padding: 10px;
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
		  padding: 0 100px;
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
        <td class="text-right">Tel : 94-657.37.45</td>
      </tr>
      <tr>
        <td>Erandio-Bizkaia</td>
      </tr>
    </table>
	</header>
	<div style="padding: 1em;">
		@yield('datos-personales')
	</div>

	@yield('content')

	<div class="entregadoRecibido">
		<table>
			<tr>
				<td>Recibido por:</td>
				<td class="text-right">Entregado por:</td>
			</tr>
		</table>
	</div>

<footer>
	@section('footer')
		<span>Elaborado con Software Libre por Reciclanet</span>
	@show
</footer>

</body>
</html>
