<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\TableObject;
use App\Models\Notification;
use App\Models\PassedTest;
use App\Models\Result;

use App\Http\Requests\TestCreateRequest;
use App\Http\Requests\TestUpdateRequest;

class TestController extends Controller
{
    public function index()
    {   
        return response()->json(['success' => true, 
                                 'data' => Test::all()]);
    }

    public function show($id)
    {
        $test = Test::find($id);

        if ($test === null) {

            return response()->json(['success' => false,
                                     'data' => "Тест с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $test]);

        }
    }

    public function create(TestCreateRequest $request)
    {
        $test = new Test;

        $test->name = $request->name;
        $test->description = $request->description;
        $test->category_id = $request->category_id;
        $test->user_id = $request->user_id;
        $test->number_passes = 0;
        $test->activity = 0;
        
        $test->save();

        return response()->json(['success' => true,
                                 'data' => $test]);
    }

    public function update(TestUpdateRequest $request, $id)
    {

        $test = Test::find($id);

        if ($test === null) {

            return response()->json(['success' => false,
                                     'data' => "Тест с id = {$id} не найден"]);

        } else {
            
            $test->name = $request->name;
            $test->description = $request->description;
            $test->category_id = $request->category_id;
            $test->user_id = $request->user_id;
            $test->number_passes = 0;
            $test->activity = 0;
    
            $test->save();

            return response()->json(['success' => true, 
                                     'data' => $test]);

        }
    }

    public function delete($id)
    {
        $test = Test::find($id); // Находим тест по id из ссылки


        if ($test === null) {

            return response()->json(['success' => false,
                                     'data' => "Тест с id = {$id} не найден"]);

        } else {
            
            $table_objects = TableObject::all()->where('test_id', $id); // Находим объекты этого теста по id теста

            // Перед удалением необходимо зачистить все зависимые объекты
            foreach ($table_objects as $table_object) { // Проходимся по всем объектам для удаления
                
                $results = Result::all()->where('table_object_id', $table_object->id);  // Находим результаты этого объекта по id объекта
                // Проходимся по всем и удаляем каждый объект
                foreach ($results as $result) {    
                    $result->delete();
                }
    
                $table_object->delete(); // Удаляем объект
            }
    
            $passed_tests = PassedTest::all()->where('test_id', $id);
            foreach ($passed_tests as $passed_test) {
    
                $results = Result::all()->where('passed_test_id', $passed_test->id);
                foreach ($results as $result) {    
                    $result->delete();
                }
    
                $passed_test->delete();  // Удаляем факты прохождения теста
            }
    
            $notifications = Notification::all()->where('test_id', $id);
            foreach ($notifications as $notification) {
                $notification->delete(); // Удаляем информацию о добавлении теста
            }
    
            $test->delete(); // Можем удалить тест, так как у него не осталось свидетелей

            return response()->json(['success' => true, 
                                     'data' => $test]);

        }
    }

    public function restore($id)
    {
        $test = Test::withTrashed()->find($id);
        
        if ($test === null) {
            
            return response()->json(['success' => false,
                                     'data' => "Тест с id = {$id} не найден"]);

        } else {
            
            $test->restore();
            return response()->json(['success' => true, 
                                     'data' => $test]);
            
        }
    }
}
