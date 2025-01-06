<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Tracking Result</h2>

    @if (isset($result['error']))
        <div class="alert alert-danger">
            Error: {{ $result['error'] }}
        </div>
    @else
        <div class="alert alert-success">
            <pre>{{ print_r($result, true) }}</pre>
        </div>
    @endif

    <a href="{{ route('track.form') }}" class="btn btn-primary">Go Back</a>
</div>
</body>
</html>