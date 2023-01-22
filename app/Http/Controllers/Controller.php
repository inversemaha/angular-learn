<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function home()
    {
        return view("home.index");
    }

    public function getUpaZila($district_id)
    {
        return [
            'status_code' => 200,
            'upazila' => Upazila::where('district_id', $district_id)->get()
        ];
    }
}
