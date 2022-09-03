<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {

        $category = Category::get();

        return  CategoryResource::collection($category);
     
    }


    public function store(Request $request)
    {
      
        $category = Category::create([
            'name' => $request->name,
            
        ]);

       
        return response($category, 201);
    }


    public function update(Request $request, $id)
    {

        $category = Category::find($id); 

        $category->update([
            'name' => $request->name,
            
        ]);

        return response($category, 201);
    }

   
    public function destroy($id)
    {

        $category = Category::find($id); 

        $category->delete();

        return response($category, 201);
    }

    
}
