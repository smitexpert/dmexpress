<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Marchent</th>
                    <th>Delivered</th>
                    <th>Returned</th>
                    <th>Payable</th>
                    <th>Total Charge</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marchents as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            {{ $item->name }} <br>
                            {{ $item->phone }}
                        </td>
                        <td>{{ $item->parcels->where('status_id', 8)->count() }}</td>
                        <td>{{ $item->parcels->where('status_id', 6)->count() }}</td>
                        <td>{{ $item->parcels->where('status_id', 8)->sum('collection')-$item->parcels->where('status_id', '!=', 1)->where('status_id', '!=', 7)->sum('charge') }}</td>
                        <td>{{ $item->parcels->where('status_id', '!=', 1)->where('status_id', '!=', 7)->sum('charge') }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="{{ route('admin.payment.invoice.show', ['id' => $item->id]) }}" class="btn btn-success btn-sm">View</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>