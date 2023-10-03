<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::paginate();
        // $trusedcolor = Color::onlyTrushed()->get();
        return view('backend.color.colors',[
            'colors' => $colors,
            // 'trusedcolor' => $trusedcolor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required|unique:colors|max:30'
        ]);
        $colorstore = new Color;
        $colorstore->color_name = $request->color_name;
        $colorstore->slug = Str::slug($request->color_name);
        $colorstore->save();
        return back()->with('ColorStore', "Color Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $colorupdate = Color::find($request->id);
        $colorupdate->color_name = $request->color_name;
        $colorupdate->slug = Str::slug($request->color_name);
        $colorupdate->save();
        return back()->with('ColorUpdate', "Color Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
