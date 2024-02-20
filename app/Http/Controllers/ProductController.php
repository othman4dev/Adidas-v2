<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Tage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->with('tage')->orderBy('created_at', 'desc')->paginate(4);
        $TagList = [];
        foreach($products as $product){
            foreach($product['tage'] as $tages){
                $TagList[$tages['product_id']][]=Tage::where('id',$tages['tage_id'])->get()[0];
            }
        }
        $categories = Categorie::all();
        $tages = Tage::all();
        return view("product",compact('products','categories','tages','TagList'));
    }
    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'tages_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $imageName="default.png";
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
        }
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id'];
        $product->imageuri = $imageName;
        $product->save();
        $lastInsertedId = $product->id;
        foreach($validatedData['tages_id'] as $dataTage){
            $tages = [
                'tage_id' => $dataTage,
                'product_id' => $lastInsertedId,
            ];
            ProductTag::create($tages);
        }
        return redirect('/Products');
    }
    public function delet($id){
        $product = Product::find($id);
        $oldImageName = $product->imageuri;
        if($oldImageName != "default.png"){
            Storage::disk('public')->delete("images/$oldImageName");   
        }
        $product->delete();
        return redirect('/Products');
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'tages_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = Product::find($id);
        $oldImageName = $product->imageuri;
        $imageName = $oldImageName;
        if ($request->hasFile('image')) {
            if($oldImageName != "default.png"){
                Storage::disk('public')->delete("images/$oldImageName");   
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
        }

        Product::where('id',$id)->update([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'imageuri' => $imageName,
        ]);
        ProductTag::where('product_id',$id)->delete();
        foreach($validatedData['tages_id'] as $dataTage){
            $tages = [
                'tage_id' => $dataTage,
                'product_id' => $id,
            ];
            ProductTag::create($tages);
        }
        
        return redirect('/Products');
    }

}
