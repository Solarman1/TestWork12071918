<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SomeProduct;

class DefaultApiController extends Controller
{
    public function index()
    {
        return SomeProduct::all();
    }

    public function store(Request $request)
    {
        SomeProduct::create($request->all());

    }

    public function show($id)
    {
        return SomeProduct::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $article = SomeProduct::findOrFail($id);
        
        $article->update($request->all());

        return $article;
    }

    public function destroy($id)
    {
        $someProduct = SomeProduct::findOrFail($id);

         if($someProduct->delete())
            return response(null, 204);
    }
}
