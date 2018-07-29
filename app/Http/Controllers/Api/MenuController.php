<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Get a listing of the menu.
     *
     * @return Menu[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Menu::all();
    }

    /**
     * Store a newly created menu in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'enabledFrom' => 'required',
            'enabledUntil' => 'required'
        ]);
        $menu = Menu::create($request->all());
        return response()->json($menu, 201);
    }

    /**
     * Get the specified menu.
     *
     * @param Menu $menu
     * @return mixed
     */
    public function show(Menu $menu)
    {
        return $menu->products;
    }

    /**
     * Update the specified menu in storage.
     *
     * @param Request $request
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string',
            'enabledFrom' => 'required',
            'enabledUntil' => 'required'
        ]);
        $menu->update($request->all());
        return response()->json($menu, 200);
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(null, 204);
    }
}