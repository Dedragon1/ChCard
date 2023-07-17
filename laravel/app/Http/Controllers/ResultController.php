<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {

        return response()->json(['success' => true, 
                                     'data' => Result::all()]);
    }

    public function show($id)
    {

        $result = Result::find($id);

        if ($result === null) {

            return response()->json(['success' => false,
                                     'data' => "Результат с id = {$id} не найден"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $result]);

        }
    }
}
