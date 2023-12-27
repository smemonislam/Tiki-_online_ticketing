<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        

        return view ("backend.dashboard.index");
    }
}
