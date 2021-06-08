<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PICKUP REQUESTED PARCEL</title>

    <style>
        .parcel-table {
            border-collapse: collapse;
            width: 100%;
        }

        .parcel-table td, .parcel-table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div style="text-align: center; margin-top: 20px;">
        <h1 style="padding-bottom: 0; margin: 0">DMEX</h1>
        <p style="margin: 0; padding: 0">PICKUP SHEET</p>
    </div>
    <table>
        <tr>
            <th>Marchent Name</th>
            <td>:</td>
            <td>{{ $marchent->name }}</td>
        </tr>
        <tr>
            <th>Marchent Phone</th>
            <td>:</td>
            <td>{{ $marchent->phone }}</td>
        </tr>
    </table>
    <hr>
    <table class="parcel-table">
        <tr>
            <th>TRACKING ID</th>
            <th>MARCHENT INVOICE</th>
            <th>DELIVERY TYPE</th>
            <th>DELIVERY AREA</th>
            <th>PICKUP ADDRESS</th>
            <th>SIGNATURE</th>
        </tr>

        @foreach ($marchent->parcels as $item)
            <tr>
                <td>{{ $item->tracking }}</td>
                <td>{{ $item->marchent_invoice_no }}</td>
                <td>{{ $item->type->name }}</td>
                <td>{{ $item->area->name }}</td>
                <td>
                    {{ $item->pickup->address }} <br>
                    {{ $item->pickup->phone }} <br>
                    {{ $item->pickup->area->name }} <br>
                </td>
                <td></td>
            </tr>
        @endforeach
    </table>
    <hr>
    
</body>
</html>