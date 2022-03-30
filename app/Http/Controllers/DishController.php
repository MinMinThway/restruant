<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishStoreRequest;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        
        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishStoreRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category_id;
        
        if($request->image){
            $image = $request->file("image");
            $fileName = time() . $image->getClientOriginalName();
            $image->move(public_path() . "/image", $fileName);     
        }
        $dish->image=$fileName;
        $dish->save();
        return redirect()->route('dish.index')->with("status", "Created Success!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // dd($dish->category->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('kitchen.edit', compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            "name" => "required",
            "category_id" => "required"
        ]);

        $dish->name = $request->name;
        $dish->category_id = $request->category_id;
        if($request->image){
            unlink(public_path().'/image//'.$dish->image);

            $image = $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $image->move(public_path().'/image',$fileName);
            $dish->image = $fileName;
        }

        $dish->save();
        return redirect()->route('dish.index')->with("status", "Updated Success!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        unlink(public_path().'/image//'.$dish->image);
       $dish->delete();
       return redirect()->route('dish.index')->with("status", "Deleted Success!");
    }
}
