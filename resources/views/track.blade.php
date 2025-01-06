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
    <h2>Track Shipment</h2>

    <form action="{{ route('track.shipment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="carrierBookingReference">Carrier Booking Reference</label>
            <input type="text" id="carrierBookingReference" name="carrierBookingReference" class="form-control" >
        </div>

        <div class="form-group">
            <label for="transportDocumentReference">Transport Document Reference</label>
            <input type="text" id="transportDocumentReference" name="transportDocumentReference" class="form-control" >
        </div>

        <div class="form-group">
            <label for="equipmentReference">Equipment Reference</label>
            <input type="text" id="equipmentReference" name="equipmentReference" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Track</button>
    </form>
</div>
</body>
</html>