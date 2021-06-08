<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Requested Parcels</h3>
            </div>
            <div class="box-body" wire:poll>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>TRACKING ID</th>
                            <th>CUSTOMER PHONE</th>
                            <th>COLLECTION AMOUNT</th>
                            <th>PRODUCT PRICE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marchent->parcels as $item)
                            <tr>
                                <td>{{ $item->tracking }}</td>
                                <td>
                                    {{ $item->customer_name }} <br>
                                    {{ $item->customer_phone }} <br>
                                    {{ $item->address }}
                                </td>
                                <td>{{ $item->collection }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button wire:click="approve({{ $item->id }})" class="btn btn-sm btn-success">APPROVE</button>
                                        <a href="{{ route('admin.parcels.edit', ['parcel' => $item->id]) }}" class="btn btn-sm btn-info">EDIT</a>
                                        <button wire:click="cancel({{ $item->id }})" class="btn btn-sm btn-danger">CANCEL</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>