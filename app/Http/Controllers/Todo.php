<?php

namespace App\Http\Controllers;

use App\Models\Todo as ModelsTodo;
use Illuminate\Http\Request;

class Todo extends Controller
{
    public function index()
    {
        $todos = ModelsTodo::get();
        // dd($todos);

    }
}
