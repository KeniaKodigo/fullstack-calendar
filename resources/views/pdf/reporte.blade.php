<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Personaliza los estilos adicionales si es necesario */
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1 class="text-center text-primary">{{$title}}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

    <table class="table table-bordered">
        <tr>
            <th>Reservacion</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Monto Total</th>
        </tr>
        @foreach($bookings as $item)
        <tr>
            <td>{{ $item->booking }}</td>
            <td>{{ $item->check_in_date }}</td>
            <td>{{ $item->check_out_date }}</td>
            <td>{{ $item->total_amount }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>