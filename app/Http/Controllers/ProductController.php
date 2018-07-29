<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Show the form for creating a new product.
     *
     * @param int $menuId
     * @return \Illuminate\Http\Response
     */
    public function create($menuId)
    {
        return view('products.create')->with('menuId', $menuId);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $menuId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $menuId)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer'
        ]);
        $product = new Product([
            'name' => $request->input('name'),
            'menu_id' => $menuId,
            'position' => $request->input('position')
        ]);
        $product->save();
        return redirect()->route('menus.show', $menuId);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param null $menuId
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function edit($menuId = null, $productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $menuId
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menuId, $productId)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer'
        ]);
        $product = Product::findOrFail($productId);
        $product->name = $request->input('name');
        $product->position = $request->input('position');
        $product->save();
        return redirect()->route('menus.show', $menuId);
    }

    /**
     * Remove the specified product from storage.
     *
     * @param int $menuId
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect()->route('menus.show', $menuId);
    }
}
