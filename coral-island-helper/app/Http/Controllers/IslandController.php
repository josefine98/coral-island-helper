<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IslandController extends Controller
{
    public function index(Request $request)
    {
        //$offerings = json_decode(file_get_contents(storage_path() . "/data/offerings.json"), true);
        //return view('offerings')->with('offerings', $offerings);
        return view('livewire.offerings');
    }
}
