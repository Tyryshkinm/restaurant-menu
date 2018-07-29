<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @param $menuId
     * @return mixed
     */
    public function store(Request $request, $menuId)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer'
        ]);
        $request->request->add(['menu_id' => $menuId]);
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param null $menuId
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $menuId = null, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer'
        ]);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param null $menuId
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($menuId = null, Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}