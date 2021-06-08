<?php

namespace App\Http\Livewire\Admin;

use App\Models\Parcel;
use App\Models\ParcelTimeline;
use Livewire\Component;

class Hero extends Component
{
    public $hero_id;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function assign($item)
    {
        $this->emitTo('admin.parcel-assign-modal', 'assign', $item);
        // dd($item);
    }

    public function mount($id)
    {
        $this->hero_id = $id;
    }

    public function updatePracel($id, $status)
    {
        $parcel = Parcel::where('id', $id)->first();

        if($status == 5)
        {
            Parcel::where('id', $id)->update([
                'status_id' => $status,
                'attempt' => $parcel->attempt+1
            ]);

        }else{
            Parcel::where('id', $id)->update([
                'status_id' => $status
            ]);
        }

        if($status == 5)
        {
            ParcelTimeline::create([
                'parcel_id' => $id,
                'text' => 'কাস্টমার পার্সেলটি রিসিভ করেনি। দ্বিতীয় বার চেস্টার জন্য প্রস্তুত করা হয়েছে।'
            ]);
        }

        if($status == 6)
        {
            ParcelTimeline::create([
                'parcel_id' => $id,
                'text' => 'পার্সেলটি রিটার্ন করা হয়েছে।'
            ]);
        }

        if($status == 8)
        {
            ParcelTimeline::create([
                'parcel_id' => $id,
                'text' => 'পার্সেলটি ডেলিভারী সম্পূর্ণ হয়েছে।'
            ]);
        }

        if($status == 7)
        {
            ParcelTimeline::create([
                'parcel_id' => $id,
                'text' => 'পার্সেলটি বাতিল করা হয়েছে।'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.hero', [
            'parcels' => Parcel::with('marchent', 'area', 'status')->where('hero_id', $this->hero_id)->where('status_id', 4)->orWhere('status_id', 5)->get()
        ]);
    }
}
