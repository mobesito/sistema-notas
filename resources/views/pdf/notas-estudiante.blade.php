@vite(['resources/js/app.js'], 'defer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de notas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Reporte de notas</h3>
<h4>Estudiante: {{$estudiante->nombre}} {{$estudiante->apellido}}</h4>
<table class="table table-striped" id="tabla">
    <thead>
      <tr>
        <th scope="col">Materia</th>
        <th scope="col">Nota 1</th>
        <th scope="col">Nota 2</th>
        <th scope="col">Nota 3</th>
        <th scope="col">Nota 4</th>
        <th scope="col">Nota 5</th>
        <th scope="col">Nota 6</th>
        <th scope="col">Nota 7</th>
        <th scope="col">Nota 8</th>
        <th scope="col">Nota 9</th>
        <th scope="col">Nota 10</th>
        <th scope="col">Nota Final</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($notasDeEstudiante as $nota)
          <tr>
              <td>{{$nota->materia->nombre_materia}}</td>
              <td>{{$nota->nota_1}}</td>
              <td>{{$nota->nota_2}}</td>
              <td>{{$nota->nota_3}}</td>
              <td>{{$nota->nota_4}}</td>
              <td>{{$nota->nota_5}}</td>
              <td>{{$nota->nota_6}}</td>
              <td>{{$nota->nota_7}}</td>
              <td>{{$nota->nota_8}}</td>
              <td>{{$nota->nota_9}}</td>
              <td>{{$nota->nota_10}}</td>
              <td>{{$nota->nota_final}}</td>
          </tr>
      @endforeach
    </tbody>
</table>
<script>
    new DataTable("#tabla");
</script>
</body>
</html>
