<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
  public function __construct(){
    date_default_timezone_set('America/Santiago');
  }

    public function reporteUsuarios(){
      $var = '
        <html>
          <head>
            </head>
          <body>
            <h6 align="right">Fecha: '.date('d/m/Y').'</h6>
            <h6 align="right">Hora: '.date('h:m:s').'</h6>
            <div id="logo" style="position:absolute; width:300px; height:100px; top: 10px; left: 15px">
              <img src="https://soluciontotal.cl/logost.png" height="42" width="200" top: 0px; left: 10px>
            </div>
            <h1 align="center">Reporte de Usuarios</h1>
              <table border="1" align="center" class="css" width="100%">
                <tr>
                  <td bgcolor="">N°</td>
                  <td bgcolor="">Nombre</td>
                  <td bgcolor="">Correo</td>
                  <td bgcolor="">Teléfono</td>
                  <td bgcolor="">Administrador</td>
                  <td bgcolor="">Habilitado</td>
                </tr>
              </table>
          </body>
        </html>
      ';
      $mpdf = new \Mpdf\Mpdf();

      $mpdf->WriteHTML($var);

      $mpdf->Output();
    }
}
