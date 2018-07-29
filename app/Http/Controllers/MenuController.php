<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'enabledFrom' => 'required',
            'enabledUntil' => 'required'
        ]);
        $menu = new Menu([
            'name' => $request->input('name'),
            'enabledFrom' => $request->input('enabledFrom'),
            'enabledUntil' => $request->input('enabledUntil')
        ]);
        $menu->save();
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit')->with('menu', $menu);
    }

    /**
     * Update the specified menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'enabledFrom' => 'required',
            'enabledUntil' => 'required'
        ]);
        $menu = Menu::findOrFail($id);
        $menu->name = $request->input('name');
        $menu->enabledFrom = $request->input('enabledFrom');
        $menu->enabledUntil = $request->input('enabledUntil');
        $menu->save();
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index');
    }
}
