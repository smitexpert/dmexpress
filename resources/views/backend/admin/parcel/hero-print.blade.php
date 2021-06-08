<!DOCTYPE html>
<html lang="en" style="margin: 0; padding: 0;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hero Print</title>
    <style>
        .text-center {
            text-align: center;
        }

        .all {
            margin: 0;
            padding: 0;
        }

        .info {
            text-align: left;
        }

        .parcel-table {
            text-align: left;
            width: 100%;
            border-collapse: collapse;
        }

        .parcel-table td, .parcel-table th {
            border: 1px solid #000;
            padding: 4px 6px;
        }
    </style>
</head>
<body style="padding: 0; margin: 0;">
    <h3 class="text-center all">DMEX</h3>
    <p class="text-center all">List Of Parcels</p>
    <p class="all" style="text-align: right">{{ date('d M, Y') }}</p>
    <hr>
    <table class="info">
        <tr>
            <th>Hero Name</th>
            <td>:</td>
            <td>{{ $hero->name }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>:</td>
            <td>{{ $hero->phone }}</td>
        </tr>
    </table>
    <hr>
    <table class="parcel-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tracking ID</th>
                <th>Customer</th>
                <th>Marchent</th>
                <th>Collection Amount</th>
                <th>REMARK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hero->parcels as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->tracking }}</td>
                    <td>
                        {{ $item->customer_name }} <br>
                        <b>{{ $item->customer_phone }}</b> <br>
                        <address>
                            {{ $item->address }}
                        </address>
                        <b>{{$item->area->name }}</b>
                    </td>
                    <td>
                        {{ $item->marchent->name }} <br>
                        {{ $item->marchent->phone }} <br>
                    </td>
                    <td>
                        <b>{{ $item->collection }} Tk.</b>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>