<?php

namespace App\Http\Controllers;

use App\ShoppingItem;
use App\Http\Resources\ShoppingItem as ShoppingItemResource;
use Illuminate\Http\Request;

class ShoppingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShoppingItemResource::collection(ShoppingItem::all());
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
     * @param  \App\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingItem $shoppingItem)
    {
        //
    }
}
