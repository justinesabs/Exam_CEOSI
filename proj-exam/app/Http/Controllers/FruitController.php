<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruits; 

class FruitController extends Controller
{
    public function index(){
        $fruits = Fruits::all();
        return view('fruits.index', ['fruits' => $fruits]);
    }
    //fetch all records in my index page
    public function create(){
        return view('fruits.create');
    }
    //create method to return the view on creating a new fruit
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $newFruit = Fruits::create($data);

        return redirect(route('fruit.index'))->with('added', 'Fruit Added Successfully');
    }
    //store method is for handling the submission form data when creating a new fruit
    public function edit(Fruits $fruit){
        return view('fruits.edit', ['fruit' => $fruit]);
    }
    //edit method is for rendering the form to edit an existing fruit
    public function update(Fruits $fruit, Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $fruit->update($data);

        return redirect(route('fruit.index'))->with('success', 'Fruit Updated Successfully');
    }
    //this method is for handling the submission form data when updating a new fruit
    public function destroy(Fruits $fruit){

        $fruit->delete();

        return redirect(route('fruit.index'))->with('deleted', 'Fruit Deleted Successfully');
    }
    //delete method is responsible for deleting an existing fruit
}
