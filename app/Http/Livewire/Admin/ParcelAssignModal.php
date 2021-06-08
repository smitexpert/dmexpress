<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hero;
use App\Models\Parcel;
use App\Models\ParcelTimeline;
use Livewire\Component;

class ParcelAssignModal extends Component
{

    public $tracking, $hero_id, $parcel_id;

    protected $listeners = [
        'assign' => 'assign'
    ];

    public function submit()
    {
        Parcel::where('id', $this->parcel_id)->update([
            'status_id' => 4,
            'hero_id' => $this->hero_id
        ]);

        $hero = Hero::where('id', $this->hero_id)->first();

        ParcelTimeline::create([
            'parcel_id' => $this->parcel_id,
            'text' => 'ডেলিভারী হিরো '.$hero->name.' ('.$hero->phone.') বের হয়েছে।',
        ]);

        $this->dispatchBrowserEvent('assign');

        $this->hero_id = '';

        $this->emitTo('admin.parcel-approved', 'refresh');
        $this->emitTo('admin.hero', 'refresh');
    }

    public function assign($item)
    {
        $this->tracking = $item['tracking'];
        $this->parcel_id = $item['id'];
    }

    public function render()
    {
        $heros = Hero::all();

        return view('livewire.admin.parcel-assign-modal', [
            'heros' => $heros
        ]);
    }
}
