<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Did_know;
use App\Models\Stock;
use App\Models\Promotion;
use App\Models\About_data;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $did_know = Did_know::count();
        $stock = Stock::count();
        $promotion = Promotion::count(); 
        $about_count = About_data::count();

        return view('dashboard.dashboard', [
            'did_know_count' => $did_know,
            'stock_count' => $stock,
            'promotion_count' => $promotion,
            'about_count' => $about_count

        ]);
    }
}
