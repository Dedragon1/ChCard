<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TableObject;
use App\Models\Result;

use App\Http\Requests\TableObjectCreateRequest;
use App\Http\Requests\TableObjectUpdateRequest;

class TableObjectController extends Controller
{
    public function index()
    {   
        return response()->json(['success' => true, 
                                 'data' => TableObject::all()]);

    }

    public function show($id)
    {

        $table_object = TableObject::find($id);

        if ($table_object === null) {

            return response()->json(['success' => false,
                                     'data' => "Объект теста с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $table_object]);

        }

    }

    public function create(TableObjectCreateRequest $request)
    {
        $table_object = new TableObject;

        $table_object->test_id = $request->test_id;
        $table_object->name = $request->name;
        $table_object->description = $request->description;
        $table_object->image = $request->file('image')->store('table_object', 'public');
        
        $table_object->save();

        return response()->json(['success' => true, 
                                 'data' => $table_object]);

    }

    public function update(TableObjectUpdateRequest $request, $id)
    {
        $table_object = TableObject::find($id);

        if ($table_object === null) {

            return response()->json(['success' => false,
                                     'data' => "Объект теста с id = {$id} не найден"]);

        } else {

            $table_object->test_id = $request->test_id;
            $table_object->name = $request->name;
            $table_object->description = $request->description;
            $table_object->image = $request->file('image')->store('table_object', 'public');
            
            $table_object->save();
            
            return response()->json(['success' => true, 
                                     'data' => $table_object]);

        }


    }

    public function delete($id)
    {
        $table_object = TableObject::find($id);
        
        if ($table_object === null) {

            return response()->json(['success' => false,
                                     'data' => "Объект теста с id = {$id} не найден"]);

        } else {
            
            $tests = TableObject::all()->where('category_id', $id);

            $results = Result::all()->where('table_object_id', $table_object->id); 
            foreach ($results as $result) {    
                $result->delete();
            }
    
            $table_object->delete();

            return response()->json(['success' => true, 
                                     'data' => $table_object]);

        }



    }

    public function restore($id)
    {
        $table_object = TableObject::withTrashed()->find($id);
        
        if ($table_object === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Объект теста с id = {$id} не найден"]);

        } else {
            
            $table_object->restore();
            return response()->json(['success' => true, 
                                     'data' => $table_object]);         
        }
    }
}
