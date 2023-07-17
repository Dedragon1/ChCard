<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Test;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 
                                 'data' => Category::all()]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if ($category === null) {

            return response()->json(['success' => false,
                                     'data' => "Категория с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $category]);

        }    
    }

    public function create(CategoryCreateRequest $request)
    {
        $category = new Category;      

        $category->name = $request->name;
        $category->image = $request->file('image')->store('category', 'public');
        
        $category->save();

        return response()->json(['success' => true, 
                                 'data' => $category]);

    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);

        if ($category === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Категория с id = {$id} не найден"]);

        } else {
        
            $category->name = $request->name;
            $category->image = $request->file('image')->store('category', 'public');
            $category->save(); 
            
            return response()->json(['success' => true, 
                                     'data' => $category]);

        }    
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if ($category === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Категория с id = {$id} не найден"]);

        } else {

            $tests = Test::all()->where('category_id', $id);

            foreach ($tests as $test) {
                $test->update(['category_id' => 1]);
            }

            $category->delete();

            return response()->json(['success' => true, 
                                     'data' => $category]);            
        }
    }

    public function restore($id)
    {

        $category = Category::withTrashed()->find($id);
        //$category = Category::find($id);
        
        if ($category === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Категория с id = {$id} не найден"]);

        } else {
            
            $category->restore();

            return response()->json(['success' => true, 
                                     'data' => $category]);   
            
        }

    }
}
