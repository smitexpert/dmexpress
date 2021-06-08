<!DOCTYPE html>
<html lang="en" style="margin: 0; padding: 0;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="/backend/fonts/style.css"> --}}
    <title>POST 58mm Print</title>
    <style>
        body{
            font-family: "Nikosh";
        }
    </style>
</head>
<body style="margin: 0; padding: 0 5px;">
    <br>
    <p style="padding-bottom: 0; font-size: 18px; margin: 0; margin-bottom: 0;  text-align: center; font-weight: bold;">DMEX</p>
    <p style="margin-top: 0;  text-align: center;">PARCEL DESCRIPTION</p>
    <div style=" text-align: center;">
        <hr>
        {{-- {!! DNS1D::getBarcodeSVG($parcel->tracking, 'C128', 1.8, 33) !!} --}}
        {!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($parcel->tracking, 'C128', 1.3, 20) . '" alt="barcode"   />' !!}
        <p style="font-size: 11px; margin: 0; text-align: center;">{{ $parcel->tracking }}</p>
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

    @if ($parcel->hero_id)
    <p style="margin-bottom: 5px;"><b># Delivery Hero Details:</b></p>
    <p style="margin: 0;">{{ $parcel->hero->name }}</p>
    <p style="margin: 0;">{{ $parcel->hero->phone }}</p>
    <hr>
    @endif

    <p style="margin-bottom: 5px;"><b># Collection Amount:</b></p>
    <p style="font-size: 22px; text-align: left; margin: 0;"><b>{{ $parcel->collection }}/- BDT</b></p>
    <p style="text-align: left; margin: 0; margin-top: 0;  text-align: center;">*****************</p>
    <hr>
    <p style="text-align: left; margin: 0; margin-top: 0;  text-align: center;">This is an auto generated <br> report of DMEX</p>
    <p style="text-align: left; margin: 0; margin-top: 0; font-size: 16px; font-weight: bold; text-align: center;">DMEX</p>
</body>
</html>