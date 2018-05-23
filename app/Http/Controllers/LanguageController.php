<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    function changeLanguage(Request $request) {
        if ($request->has('lang')) {
            $language = $request->lang;
            if (in_array($language,config('language.lang_available'))) {
                $response = new Response($language);
                $response->withCookie(cookie('manaValoda', $language, 360000000));
                return $response;
            //    return Redirect::back()->cookie('manaValoda', $language, 360000000);      
            } else {     
                $response = new Response("$0");
                return $response;     
            }
        }
    }
}
