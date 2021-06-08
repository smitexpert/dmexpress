<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .center {
            text-align: center;
        }

        #table {
            width: 100%;
            border-collapse: collapse;
        }

        #table tr {
            
        }

        #table tr td, #table tr th {
            border: 1px solid #000;
            margin: 0;
            padding: 4px;
        }
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left">
                <h2 style="padding: 0; margin: 0;">DMEXPRESS</h2>
                <p style="padding: 0; margin: 0;">DHAKA MATRO EXPRESS</p>
            </td>
            <td style="text-align: right">
                Date: {{ date('d M, Y', strtotime($invoice->created_at)) }}
            </td>
        </tr>
    </table>
    <br>
    <h3 class="center">Payment Invoice <b># {{ $invoice->invoice }}</b></h3>
    <h4 style="padding: 0; margin: 0;">
        Marchent: {{ $invoice->marchent->name }}
    </h4>
    <p style="padding: 0; margin: 0;"><b>Phone: {{ $invoice->marchent->phone }}</b></p>
    <br>
    <table style="text-align: left">
        <tr>
            <th>Payable</th>
            <td>:</td>
            <td>{{ $invoice->amount }} Tk.</td>
        </tr>
        <tr>
            <th>Charge</th>
            <td>:</td>
            <td>{{ $invoice->charge }} Tk.</td>
        </tr>
        @if ($invoice->payment->type == 'bkash')
        <tr>
            <th>{{ $invoice->payment->name }}</th>
            <td>:</td>
            <td>{{ $invoice->payment->account_number }} </td>
        </tr>
        @endif
        @if ($invoice->payment->type == 'bank')
        <tr>
            <th>BANK NAME</th>
            <td>:</td>
            <td>{{ $invoice->payment->name }}</td>
            <td>-</td>
            <th>ACCOUNT NO</th>
            <td>:</td>
            <td>{{ $invoice->payment->account_number }} </td>
        </tr>
        <tr>
            <th>BRANCH</th>
            <td>:</td>
            <td>{{ $invoice->payment->branch_name }}</td>
            <td>-</td>
            <th>ACCOUNT TYPE</th>
            <td>:</td>
            <td>{{ $invoice->payment->account_type }} </td>
        </tr>
        @endif
    </table>

<br>

    <table id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>TRACKING ID</th>
                <th>CUSTOMER</th>
                <th>COLLECTION</th>
                <th>Payable</th>
                <th>CHARGE</th>
                <th>Status</th>
                <th>REMARKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->parcels as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->parcel->tracking }}</td>
                    <td>
                        {{ $item->parcel->customer_name }} <br>
                        {{ $item->parcel->customer_phone }} <br>
                    </td>
                    <td>{{ $item->parcel->collection }} Tk.</td>
                    <td>{{ $item->payable }} Tk.</td>
                    <td>{{ $item->charge }} Tk.</td>
                    <td>{{ $item->parcel->status->name }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>