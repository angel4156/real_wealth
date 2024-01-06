<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Did_know;
use App\Models\Stock;
use App\Models\Promotion;
use App\Models\About_data;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $main = Did_know::orderBy('content', 'asc')->get();
        $stock= Stock::orderBy('question', 'asc')->get();
        $promotion=Promotion::orderBy('content', 'asc')->first();
        $about=About_data::orderBy('content', 'asc')->get();
        $user=User::orderBy('id_user', 'asc')->get();
        $adminUser=User::where('id_user','=',1)->first();

        
        return view('main.first', [
            'main' => $main,
            'stock'=> $stock,
            'promotion'=>$promotion,
            'about'=>$about,
            'user'=>$user,
            'adminuser'=> $adminUser
        ]);
        
    }
}
