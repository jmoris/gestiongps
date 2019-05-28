<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
  public function __construct(){
    date_default_timezone_set('America/Santiago');
  }

    public function reporteUsuarios(){
      $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users');
                  curl_setopt($ch, CURLOPT_POST, FALSE);
                  curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $respuesta = curl_exec ($ch);
                  $usuarios= json_decode($respuesta);
                  curl_close ($ch);
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
                </tr>';

          foreach($usuarios as $usuario){
            $var .= '<tr><td>'.$usuario->id.'</td>';
            $var .= '<td>'.$usuario->name. '</td>';
            $var .= '<td>'.$usuario->email. '</td>';
            $var .= '<td>'.$usuario->phone. '</td>';
            $var .= '<td>'.(($usuario->administrator)?'Si':'No'). '</td>';
            $var .= '<td>'.(($usuario->disabled)?'No':'Si'). '</td>';
          }
    $var.=' </table>
    </body>
    </html>
    ';
      $mpdf = new \Mpdf\Mpdf();

      $mpdf->WriteHTML($var);

      $mpdf->Output();
    }

    public function reporteDispositivos(){
      $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices?all=true');
                  curl_setopt($ch, CURLOPT_POST, FALSE);
                  curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $respuesta = curl_exec ($ch);
                  $dispositivos= json_decode($respuesta);
                  curl_close ($ch);

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
                        <h1 align="center">Reporte de Dispositivos</h1>
                          <table border="1" align="center" class="css" width="100%">
                            <tr>
                            <td bgcolor="">ID</td>
                            <td bgcolor="">Nombre</td>
                            <td bgcolor="">IMEI</td>
                            <td bgcolor="">Moledo</td>
                            <td bgcolor="">Categoría</td>
                            </tr>';

                      foreach($dispositivos as $dispositivo){
                        $var .= '<tr><td>'. $dispositivo->id.'</td>';
                        $var .= '<td>'. $dispositivo->name. '</td>';
                        $var .= '<td>'. $dispositivo->uniqueId. '</td>';
                        $var .= '<td>'. $dispositivo->model. '</td>';
                        $var .= '<td>'. $dispositivo->category. '</td>';
                      }
                $var.=' </table>
                </body>
                </html>
                ';
                  $mpdf = new \Mpdf\Mpdf();

                  $mpdf->WriteHTML($var);

                  $mpdf->Output();

    }

    public function mostrar(){
      return view('reportes.mostrar');
    }

        public function reporteUsuariosPorId($id){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users?all=true');
      curl_setopt($ch, CURLOPT_POST, FALSE);
      curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec ($ch);
      curl_close ($ch);

      $usuarios = json_decode($respuesta);
      $target;

      foreach ($usuarios as $usuario){
        if($usuario->id == $id){
          $target = $usuario;
          break;
        }
      }


      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/devices?userId='.$id);
      curl_setopt($ch, CURLOPT_POST, FALSE);
      curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec ($ch);
      curl_close ($ch);

      $dispositivos = json_decode($respuesta);
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
            <h1 align="center">Reporte de usuario '.$target->name.'</h1>
              <table width="100%" border="0">
                <tr>
                  <td>Nombre:</td>
                  <td>'.$target->name.'</td>
                  <td>Correo: </td>
                  <td>'.$target->email.'</td>
                </tr>
                <tr>
                  <td>Telefono:</td>
                  <td>'.$target->phone.'</td>
                  <td>Fecha expiracion: </td>
                  <td>'.$target->expirationTime.'</td>
                </tr>
                <tr>
                  <td>Administrador:</td>
                  <td>'.(($usuario->administrator)?'Si':'No').'</td>
                  <td>Habilitado: </td>
                  <td>'.(($usuario->disabled)?'No':'Si').'</td>
                </tr>
              </table>
              <p></p>
              <table border="1" align="center" class="css" width="100%">
                <tr>
                  <td bgcolor=""><b>ID</b></td>
                  <td bgcolor=""><b>Nombre</b></td>
                  <td bgcolor=""><b>IMEI</b></td>
                  <td bgcolor=""><b>Modelo</b></td>
                </tr>';

          foreach($dispositivos as $dispositivo){
            $var .= '<tr><td>'.$dispositivo->id.'</td>';
            $var .= '<td>'.$dispositivo->name. '</td>';
            $var .= '<td>'.$dispositivo->uniqueId. '</td>';
            $var .= '<td>'.$dispositivo->model. '</td>';
          }
    $var.=' </table>
    </body>
    </html>
    ';
      $mpdf = new \Mpdf\Mpdf();

      $mpdf->WriteHTML($var);

      $mpdf->Output();
    }

    public function reporteUsuariosSeleccion(){
      $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, env('API_ENDPOINT').'/users');
                curl_setopt($ch, CURLOPT_POST, FALSE);
                curl_setopt($ch, CURLOPT_USERPWD, \Session::get('email'). ":" . \Session::get('password'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec ($ch);
                curl_close ($ch);

      return view('reportes.seleccionarUsuario', ['usuarios' => json_decode($respuesta)]);
    }
}
