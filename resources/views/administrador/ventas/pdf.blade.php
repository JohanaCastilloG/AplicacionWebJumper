<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Categorias</title>

    <style>
        table {
            width: 100%;
            border: 1px solid #000;
        }
        th,
        td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }

        caption {
            padding: 0.3em;
            color: #fff;
            background: #000;
        }

        th {
            background: #eee;
        }


        .text-center {
            text-align: center;
        }

        .inline {
            display: inline;
        }

        .img {
            height: 70px;
        }

    </style>
    
</head>

<body>

    <div>
        <img class="inline img" src="{{ asset('img/logo jumper.jpg') }}" alt="Logo">
        <h1 class="inline"> / Reporte</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>

    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Referencia</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Usuario</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
                <tr>
                    <th style="width: 20px">{{ $pago->id }}</th>
                    <td>Dia: {{ date_format($pago->created_at, 'd/m/Y') }} |
                        Hora:{{ date_format($pago->created_at, 'g:i A') }} </td>
                    <td>{{ $pago->referencia }}</td>
                    <td>{{ $pago->solicitud->documento }}</td>
                    <td>
                        <p>Nombre: {{ $pago->solicitud->user->name }} | Email: {{ $pago->solicitud->user->email }}</p>
                    </td>
                    <td>$ {{ number_format($pago->total, 0, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
