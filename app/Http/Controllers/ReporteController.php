<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reporteUsuarios(){
      $var = '
      <html lang="en">
        <head>
          </head>
        <body>
          <h6 align="right">Fecha: </h6>
          <h6 align="right">Hora: </h6>

          <div id="logo" style="position:absolute; width:300px; height:100px; top: 10px; left: 15px">
          <img src="https://soluciontotal.cl/logost.png"height="42" width="200" top: 0px; left: 10px>
          </div>
          <h1 align="center">Reporte de Usuarios</h1>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="/css/login.css">

          <table>

            <div id="reporte">
            <table border="1"  align="center" class="css" width="100%">
              <tr>
                <td bgcolor="">N°</td>
                <td bgcolor="">Nombre</td>
                <td bgcolor="">Correo</td>
                <td bgcolor="">Teléfono</td>
                <td bgcolor="">Administrador</td>
                <td bgcolor="">Habilitado</td>
            </table>


        </body>

        <body>
          <h1></h1>
            <button id="btn-descargar" type="submit" class="btn btn-block btn-primary">Descargar PDF</button>


      </body>


      </html>
';
      $mpdf = new \Mpdf\Mpdf();

      $mpdf->WriteHTML($var);

      $mpdf->Output();
    }
}
