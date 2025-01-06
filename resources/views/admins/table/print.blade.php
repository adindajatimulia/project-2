<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }

        .qr-code img {
            width: 200px;
            height: 200px;
            margin-bottom: 10px;
        }

        .qr-code p {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    @foreach ($data as $item)
        <div class="qr-code">
            <h2>{{$item['code']}}</h2>
            <img src="{{ $item['qr'] }}" alt="QR Code">
            <p>Scan QR to Order Menu</p>
        </div>
    @endforeach
</body>
</html>
