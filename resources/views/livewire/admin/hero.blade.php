<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tracking ID</th>
                    <th>Customer</th>
                    <th>Marchent</th>
                    <th>Collection Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcels as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->tracking }}</td>
                        <td>
                            {{ $item->customer_name }} <br>
                            {{ $item->customer_phone }} <br>
                            {{ $item->address }} <br>
                            {{ $item->area->name }}
                        </td>
                        <td>
                            {{ $item->marchent->name }} <br>
                            {{ $item->marchent->phone }} <br>
                        </td>
                        <td>
                            <b>{{ $item->collection }} Tk</b>
                        </td>
                        <td>{{ $item->status->name }}</td>
                        <td>
                            <div class="btn-group">
                                <button wire:click="updatePracel({{ $item->id }}, 8)" class="btn btn-sm btn-success">DELIVERED</button>
                                @if ($item->attempt <= 2)
                                    <button wire:click="updatePracel({{ $item->id }}, 5)" class="btn btn-sm btn-warning">RE - SCHEDULED</button>
                                @endif
                                <button wire:click="updatePracel({{ $item->id }}, 6)" class="btn btn-sm btn-danger">RETURNED</button>
                                <button data-toggle="modal" data-target="#modal-assign" wire:click="assign({{ $item }})" class="btn btn-sm btn-info">RE-ASSIGN</button>
                            </div>
                            <br>
                            <br>
                            <div class="btn-group">
                                <a target="blank" href="{{ route('admin.parcels.print', ['id' => $item->id]) }}" class="btn btn-sm btn-warning"><span class="fa fa-print"></span></a>
                                <a href="{{ route('admin.parcels.edit', ['parcel' => $item->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-pencil-square-o"></span></a>
                            </div>
                            <button wire:click="updatePracel({{ $item->id }}, 7)" class="btn btn-sm btn-danger">CANCEL</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>