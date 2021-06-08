<?php

namespace App\Http\Livewire\Admin;

use App\Models\Marchent;
use App\Models\Parcel;
use App\Models\ParcelTimeline;
use Livewire\Component;

class ParcelRequest extends Component
{
    public $marchent_id;

    public function mount($marchent)
    {
        $this->marchent_id = $marchent;
    }

    public function approve($id)
    {
        Parcel::where('id', $id)->update([
            'status_id' => 2
        ]);

        ParcelTimeline::create([
            'parcel_id' => $id,
            'text' => 'পার্সেলটি পিকআপ সম্পর্ন হয়েছে'
        ]);
    }

    public function cancel($id)
    {
        Parcel::where('id', $id)->update([
            'status_id' => 7
        ]);

        ParcelTimeline::create([
            'parcel_id' => $id,
            'text' => 'পার্সেলটি পিকআপ সম্পর্ন হয়নি।'
        ]);
    }

    public function render()
    {

        $marchent = Marchent::with('parcels.type', 'parcels.area', 'parcels.pickup.area')->with(['parcels' => function($q){
            return $q->where('status_id', 1);
        }])->where('id', $this->marchent_id)->firstOrFail();

        return view('livewire.admin.parcel-request', [
            'marchent' => $marchent
        ]);
    }
}
