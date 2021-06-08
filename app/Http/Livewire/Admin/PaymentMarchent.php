<?php

namespace App\Http\Livewire\Admin;

use App\Models\Marchent;
use Livewire\Component;

class PaymentMarchent extends Component
{
    public function render()
    {

        // $marchents = Marchent::with(['parcels' => function($q){
        //     $q->doesntHave('invoice');
        // }])->get();

        $marchents = Marchent::with(['parcels' => function($q){
            $q->doesntHave('invoice')->whereNotIn('status_id', [1,2,3,4,5,7]);
        }])->whereHas('parcels', function($q){
            return $q->doesntHave('invoice')->whereIn('status_id', [6, 8]);
        })->with('payoutMethod')->get();

        return view('livewire.admin.payment-marchent', [
            'marchents' => $marchents
        ]);
    }
}
