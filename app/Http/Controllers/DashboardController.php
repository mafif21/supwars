<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $weapons = Weapon::all();
        return view('dashboard', compact('categories', 'weapons'));
    }
}
