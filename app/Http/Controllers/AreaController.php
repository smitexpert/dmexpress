<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $area = Area::where('type_id', $request->id)->get();

        return response()->json($area);
    }
}
