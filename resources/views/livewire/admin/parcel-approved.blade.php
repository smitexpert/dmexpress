<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Listed Parcels</h3>
            </div>
            <div class="box-body" wire:poll>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tracking</th>
                            <th>Marchent</th>
                            <th>Customer</th>
                            <th>Delivery Area</th>
                            <th>Zone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcels as $item)
                            <tr>
                                <td>{{ $item->tracking }}</td>
                                <td>
                                    <p style="margin: 0; padding: 0;">{{ $item->marchent->name }}</p>
                                    <p style="margin: 0; padding: 0;">{{ $item->marchent->phone }}</p>
                                </td>
                                <td>
                                    <p style="margin: 0; padding: 0;">{{ $item->customer_name }}</p>
                                    <p style="margin: 0; padding: 0;">{{ $item->customer_phone }}</p>
                                    <address>
                                        {{ $item->address }}
                                    </address>
                                </td>
                                <td>
                                    {{ $item->area->name }}
                                </td>
                                <td>
                                    @if ($item->area->zone)
                                        {{ $item->area->zone->name }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.parcels.print', ['id' => $item->id]) }}" target="__blank" class="btn btn-sm btn-warning">Print</a>
                                        <button data-toggle="modal" data-target="#modal-assign" wire:click="assign({{ $item }})" class="btn btn-sm btn-info">ASSIGN</button>
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