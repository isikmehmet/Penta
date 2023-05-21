<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrunModel;

class HomeController extends Controller
{
    public function index(){
        $urunler = UrunModel::orderBy('name', 'ASC')->get();

        $data = [
            'results' => $urunler
        ];

        return view('Front.home', $data);
    }
}
