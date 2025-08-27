<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        return Inertia::render("Revenue/Index"); 
    }
}
