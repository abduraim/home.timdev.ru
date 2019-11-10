<?php

namespace App\Http\Controllers;

use App\ShoppingGroup;
use Illuminate\Http\Request;
use App\Http\Resources\ShoppingGroup as ShoppingGroupResource;

class ShoppingGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShoppingGroupResource::collection(ShoppingGroup::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoppingGroup  $shoppingGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingGroup $shoppingGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoppingGroup  $shoppingGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingGroup $shoppingGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingGroup  $shoppingGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingGroup $shoppingGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingGroup  $shoppingGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingGroup $shoppingGroup)
    {
        //
    }
}
