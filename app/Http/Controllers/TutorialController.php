<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Greeting;
use App\Services\GetYear;

class TutorialController extends Controller
{
    public function index()
    {
    	//$greeting = app(Greeting::class)->sayHello('Hi');
    	$greeting = resolve(Greeting::class)->sayHello('Howdy');
        $year = app(GetYear::class)();
        
    	return view('tutorial.index', compact('greeting', 'year'));
    }
}
