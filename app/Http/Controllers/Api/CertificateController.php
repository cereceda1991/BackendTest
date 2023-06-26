<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    public function index() {
        $certificates = Certificate::all();
        return response()->json([
            "result" => $certificates
        ], Response::HTTP_OK);
    }
    
    public function show($id)
    {
    $product = Certificate::findOrFail($id);
    return response()->json(['result' => $product], Response::HTTP_OK);
    }

    public function store(Request $request) {
        $product = new Certificate();

        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return response()->json(['result'=>$product], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) 
    {
        $product = Certificate::findOrFail($request->id);

        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return response()->json(['result'=>$product], Response::HTTP_OK);
    }

    public function destroy($id) 
    {
        Certificate::destroy($id);
        return response()->json(['message'=> "Deleted"], Response::HTTP_OK);
    }
}
