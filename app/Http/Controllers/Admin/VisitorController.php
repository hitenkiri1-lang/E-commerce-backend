<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function GetVisitorDetails()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Kolkata");
        $Visit_time = date("H:i:s");
        $Visit_date = date("Y-m-d");

        $result = Visitor::insert([
            'ip_address' => $ip_address,
            'visit_time' => $Visit_time,
            'visit_date' => $Visit_date
        ]);
        return $result;
    }
}
