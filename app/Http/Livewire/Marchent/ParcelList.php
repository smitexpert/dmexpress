<?php

namespace App\Http\Livewire\Marchent;

use App\Models\Parcel;
use App\Models\ParcelStatus;
use App\Models\ParcelTimeline;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ParcelList extends Component
{
    use WithPagination;

    public $tracking, $customer_phone, $marchent_invoice_no, $status_id;

    public function removeParcel($id)
    {
        Parcel::where('id', $id)->update([
            'status_id' => 7
        ]);

        ParcelTimeline::create([
            'parcel_id' => $id,
            'text' => 'মার্চেন্ট পার্সেলটি বাতিল করেছে।'
        ]);
    }

    public function render()
    {

        // if(($this->tracking != "") || ($this->customer_phone != "") || ($this->invoice != "") || ($this->status_id != ""))
        // {
        //     $parcels = Parcel::
        //                 where('tracking', 'like', '%'.$this->tracking.'%')
        //                 ->where('customer_phone', 'like', '%'.$this->customer_phone.'%')
        //                 ->where('marchent_invoice_no', 'like', '%'.$this->invoice.'%')
        //                 ->where('status_id', 'like', '%'.$this->status_id.'%')
        //                 ->with('pickup.area', 'status', 'type')->where('marchent_id', Auth::guard('marchent')->user()->id)->orderBy('id', 'DESC')->paginate(20);
        // }else{
        //     $parcels = Parcel::with('pickup.area', 'status', 'type')->where('marchent_id', Auth::guard('marchent')->user()->id)->orderBy('id', 'DESC')->paginate(20);
        // }

        $parcels = Parcel::
                        where('tracking', 'like', '%'.$this->tracking.'%')
                        ->where('customer_phone', 'like', '%'.$this->customer_phone.'%')
                        ->where('status_id', 'like', '%'.$this->status_id.'%')
                        ->with('pickup.area', 'status', 'type')->where('marchent_id', Auth::guard('marchent')->user()->id)->orderBy('id', 'DESC')->paginate(20);

        

        $status = ParcelStatus::all();

        return view('livewire.marchent.parcel-list', [
            'parcels' => $parcels,
            'status' => $status
        ]);
    }
}
