<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Get a listing of the menu.
     *
     * @return Menu[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Menu::all();
    }

    public function show($id)
    {
        return Menu::find($id);
    }

    public function store(Request $request)
    {
        return Menu::create($request->all());
    }
}