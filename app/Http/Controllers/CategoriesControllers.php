<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategoriesControllers extends Controller
{
    public function index(){
        $categories = Categorie::orderBy('created_at', 'desc')->paginate(7);
        return view("categories",compact('categories'));
    }
    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        Categorie::create($validatedData);
        return redirect('/Categories');
    }
    public function update(Request $request,$id){
        $validatedData=$request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        Categorie::where('id',$id)->update(['name'=>$validatedData['name']]);
        return redirect('/Categories');
    }
    public function delet($id){
        Categorie::find($id)->delete();
        return redirect('/Categories');
    }
}
