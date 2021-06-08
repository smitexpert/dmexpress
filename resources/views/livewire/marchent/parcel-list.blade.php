@push('styles')
    @livewireStyles
@endpush
@push('scripts')
    @livewireScripts
@endpush
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Parcel List</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" wire:model="tracking" class="form-control" placeholder="Tracking ID">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" wire:model="customer_phone" class="form-control" placeholder="CUSTOMER PHONE">
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" wire:model="marchent_invoice_no" class="form-control" placeholder="INVOICE NO.">
                        </div>
                    </div> --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <select wire:model="status_id" id="" class="form-control">
                                <option value="">SELECT STATUS</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" wire:poll>
                    <table class="table table-border" id="parcels">
                        <thead>
                            <tr>
                                <th>CREATION DATE</th>
                                <th>TRACKING</th>
                                <th>CUSTOMER</th>
                                <th>PICKUP ADDRESS</th>
                                <th>STATUS</th>
                                <th>PAYMENT INFO</th>
                                <th>DELIVERY TYPE</th>
                                <th>LAST UPDATE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcels as $item)
                                <tr>
                                    <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                                    <td><a href="{{ route('tracking', ['parcel' => $item->tracking]) }}" target="blank" class="btn btn-link">{{ $item->tracking }} <span class="fa fa-external-link"></span></a></td>
                                    <td>
                                        {{ $item->customer_name }} <br>
                                        {{ $item->customer_phone }} <br>
                                        {{ $item->address }}
                                    </td>
                                    <td>
                                        {{ $item->pickup->area->name }}
                                    </td>
                                    <td>
                                        {{ $item->status->name }}
                                    </td>
                                    <td>
                                        Tk. {{ $item->collection }} Cash Collection <br>
                                        Tk. {{ $item->charge }} Charge
                                    </td>
                                    <td>{{ $item->type->name }}</td>
                                    <td>{{ date('M d, Y', strtotime($item->updated_at)) }}</td>
                                    <td>
                                        @if ($item->status_id == 1)
                                            <div class="btn-group">
                                                <button wire:click="removeParcel({{ $item->id }})" class="btn btn-sm btn-danger">Cancel</button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pull-right">
                    {{ $parcels->links('pagination::default') }}
                </div>
            </div>
        </div>
    </div>
</div>