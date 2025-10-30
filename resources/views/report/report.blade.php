<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
    </style>
</head>

<body>

    <body>
        <h1 style="text-align: center">Report Produk {{ $date }}</h1>

        <table class="table table-bordered">

            <tbody>
                <tr>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Harga</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->kategori }}</td>
                    <td>{{ $product->produk }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</body>

</html>