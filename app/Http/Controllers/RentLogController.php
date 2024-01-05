<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rents = RentLogs::with(['user', 'book'])->paginate(5);
        return view('page.rent-log', ['rents' => $rents]);
    }
}
