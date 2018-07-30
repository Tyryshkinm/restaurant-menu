<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the products.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu)
    {
        $products = $menu->products->sortBy('position');
        return view('products.index')->with([
            'products' => $products,
            'menuName' => $menu->name,
            'menuId'   => $menu->id
        ]);
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
        $request->request->add(['menu_id' => $menuId]);
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer|unique_with:products,menu_id'
        ]);
        $product = new Product([
            'name' => $request->input('name'),
            'menu_id' => $menuId,
            'position' => $request->input('position')
        ]);
        $product->save();
        return redirect()->route('menus.products.index', $menuId);
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
        $product = Product::findOrFail($productId);
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|integer|unique_with:products,menu_id,' . $product->position . ' = position'
        ]);
        $product->name = $request->input('name');
        $product->position = $request->input('position');
        $product->save();
        return redirect()->route('menus.products.index', $menuId);
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
        return redirect()->route('menus.products.index', $menuId);
    }
}
