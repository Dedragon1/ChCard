<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        
        return response()->json(['success' => true, 
        'data' => Notification::all()]);

    }

    public function show($id)
    {
        $notification = Notification::find($id);

        if ($notification === null) {

            return response()->json(['success' => false,
                                     'data' => "Уведомление с id = {$id} не найдено"]);

        } else {

            return response()->json(['success' => true, 
                                     'data' => $notification]);

        }    
    }
}
