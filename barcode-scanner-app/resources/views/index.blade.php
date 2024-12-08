<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IoT Webapp QR Code Scanner</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data QR Code Scanner</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data QR Code</th>
                    <th>Scanned At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($qrCodes as $qrCode)
                    <tr>
                        <td>{{ $qrCode->id }}</td>
                        <td>{{ $qrCode->data }}</td>
                        <td>{{ $qrCode->scanned_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>