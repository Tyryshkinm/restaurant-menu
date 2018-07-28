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
     * Show the form for creating a new resource.
     *
     * @param $menuId
     * @return \Illuminate\Http\Response
     */
    public function create($menuId)
    {
        return view('products.create')->with('menuId', $menuId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $menuId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $menuId)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'position' => ''
//        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->menu_id = $menuId;
        $product->position = $request->input('position');
        $product->save();
        return redirect()->route('menus.show', $menuId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param null $menuId
     * @param $productId
     * @return \Illuminate\Http\Response
     */
    public function edit($menuId = null, $productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $menuId
     * @param $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menuId, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->name = $request->input('name');
        $product->position = $request->input('position');
        $product->save();
        return redirect()->route('menus.show', $menuId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param null $menuId
     * @param $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId = null, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect()->route('menus.show', $menuId);
    }
}
