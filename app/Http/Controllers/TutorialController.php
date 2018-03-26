<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Greeting;

class TutorialController extends Controller
{
    public function index()
    {
    	//$greeting = app(Greeting::class)->sayHello('Hi');
    	$greeting = resolve(Greeting::class)->sayHello('Howdy');
    	return view('tutorial.index', compact('greeting'));
    }
}
