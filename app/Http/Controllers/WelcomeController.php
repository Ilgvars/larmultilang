<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.------------------------------------------------------------------------------------------------------------
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $al=config('language.lang_available');
        return view("welcome", compact('al'));
    }

}
