@extends('layout.app')

@section('titulo', 'Nueva geocerca')

@section('contenido')
<div class="card">
    <h5 class="card-header">Geocerca</h5>
    <div class="espacio-20"></div>
    <div class="card-body">
        <div class="col-md-8 offset-md-2">
            <form autocomplete="off" action="/geocercas/agregar-geocerca" method="post">
                @csrf
                <div class="form-group row">
                    <label for="latitud" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: Mi Geocerca"
                            > 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longitud" class="col-sm-4 col-form-label">Descripción: </label>
                    <div class="col-sm-8">
                        <textarea name="descripcion" rows="5" cols="47" placeholder="Escriba aquí la descripcion de al geocerca."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="longitud" class="col-sm-4 col-form-label">Mapa: </label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div id="map" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
                <input type="hidden" name="area" value="" id="area">
                
        </div>
    </div>
    <div class="espacio-20"></div>
</div>
<div class="row mt-3 ">
    <div class="col-sm-12">
        <button type="button" class="btn btn-danger" onclick="location.href='/home'">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>
    </div>
</div>
<div class="espacio-20"></div>
</form>
</div>
<script>
        var shapes = [];
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: {{$servidor->latitude}}, lng: {{$servidor->longitude}}},
          zoom: {{$servidor->zoom}}
        });

        var drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.MARKER,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['circle', 'polygon']
          }
        });
        drawingManager.setMap(map);
    google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
        var newShape = event.overlay;
        newShape.type = event.type;
        shapes.push(newShape);
        if (drawingManager.getDrawingMode()) {
            drawingManager.setDrawingMode(null);
        }
    });
    google.maps.event.addDomListener(drawingManager, 'polygoncomplete', function(polygon) {
      path = polygon.getPath();
      var str = "POLYGON((";
      for(var i = 0; i < path.length; i++) {
          str +=  path.getAt(i).lat() + " " + path.getAt(i).lng();
        if (i != path.length-1) {
            str +=","
        }
      }
      str += "))";
      document.getElementById('area').value = str;
      console.log(document.getElementById('area').value);
  });
        google.maps.event.addDomListener(drawingManager, 'circlecomplete', function(circle) {
      path = circle.getCenter();
      radius = circle.getRadius();
      var str = "CIRCLE(";
      str += path.lat() + " " + path.lng();
      str += ", " + radius + ")";

      document.getElementById('area').value = str;
      console.log(document.getElementById('area').value);
  });
    google.maps.event.addListener(drawingManager, "drawingmode_changed", function () {
        if (drawingManager.getDrawingMode() != null) {
            for (var i = 0; i < shapes.length; i++) {
                shapes[i].setMap(null);
            }
            shapes = [];
        }
    });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUUzTj3yy-PU9n6PW2XwfPwyhP9CrYXcQ&libraries=drawing&callback=initMap"
         async defer></script>
@stop