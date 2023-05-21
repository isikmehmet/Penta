<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrunModel;

class UrunController extends Controller
{
    public function Detay($id){
        try{
            if(!isset($id) || empty($id))
                throw new \Exception("Sayfa Bulunamadı", 404);

            $urun = UrunModel::find($id);

            if(!$urun)
                throw new \Exception("Ürün Bulunamadı", 404);

            $data = [
                'urun' => $urun,
            ];

            return view('Front.product', $data);
        }
        catch (\Exception $e){
            // özelleştirilebilir
            return abort(404);
        }
    }
}
