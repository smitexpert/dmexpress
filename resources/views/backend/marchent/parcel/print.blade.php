<!DOCTYPE html>
<html lang="en" style="margin: 0; padding: 0;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Parcel Invoice</title>
</head>
<body style="margin: 0; padding: 0;">
    <div style="">
        <hr>
        {{-- {!! DNS1D::getBarcodeSVG($parcel->tracking, 'C128', 1.8, 33) !!} --}}
        {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($parcel->tracking, 'C128', 1.3, 20) . '" alt="barcode"   />' !!}
        <p style="font-size: 11px; margin: 0; margin-left: 50px;">{{ $parcel->tracking }}</p>
        <hr>
    </div>
    <p style="margin-bottom: 5px;"><b># Customer Details:</b></p>
    <p style="margin: 0;">{{ $parcel->customer_name }}</p>
    <p style="margin: 0;">{{ $parcel->customer_phone }}</p>
    <address>{{ $parcel->address }}</address>
    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 18px"><b>Area: </b>{{ $parcel->area->name }}</p>
    <hr>
    <p style="margin-bottom: 5px;"><b># Marchent Details:</b></p>
    <p style="margin: 0;">{{ $parcel->marchent->name }}</p>
    <p style="margin: 0;">{{ $parcel->marchent->phone }}</p>
    <hr>
    <p style="margin-bottom: 5px;"><b># Collection Amount:</b></p>
    <p style="font-size: 22px; text-align: left; margin: 0;"><b>{{ $parcel->collection }}/- BDT</b></p>
    <p style="text-align: left; margin: 0; margin-top: 0;">***********************************</p>
</body>
</html>