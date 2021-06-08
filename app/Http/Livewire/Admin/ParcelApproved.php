<?php

namespace App\Http\Livewire\Admin;

use App\Models\Parcel;
use Livewire\Component;

class ParcelApproved extends Component
{
    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function assign($item)
    {
        $this->emitTo('admin.parcel-assign-modal', 'assign', $item);
        // dd($item);
    }

    public function render()
    {
        $parcels = Parcel::where('status_id', 2)->get();

        return view('livewire.admin.parcel-approved', [
            'parcels' => $parcels
        ]);
    }
}
