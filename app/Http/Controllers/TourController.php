<?php

namespace App\Http\Controllers;

use App\Models\Tour;

class TourController extends Controller
{
    public function index()
    {
        return Tour::all();
    }
}
