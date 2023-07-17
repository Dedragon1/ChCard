<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PassedTest;

class PassedTestController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 
                                     'data' => PassedTest::all()]);
    }

    public function show($id)
    {

        $passed_test = PassedTest::find($id);

        if ($passed_test === null) {

            return response()->json(['success' => false,
                                     'data' => "Пройденный тест с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $passed_test]);

        }
    }
}
