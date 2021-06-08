<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Parcel;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        
    }

    public function tracking(Request $request)
    {
        $result = false;
        $tracking = "";
        
        $status = [];
        if($request->has('parcel'))
        {
            $tracking = $request->input('parcel');
            
            $result = true;

            $status = Parcel::with('area')->with(['timeline' => function($q){
                $q->orderBy('id', 'DESC');
            }])->where('tracking', $tracking)->first();

            if(!$status)
            {
                $result = false;
            }
        }

        return view('site.tracking.index', compact('status', 'result', 'tracking'));
    }
}
