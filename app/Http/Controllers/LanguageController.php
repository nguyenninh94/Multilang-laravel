<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{
     public function switchLang(Request $request, $lang)
     {
     	$previous_url = url()->previous();
        $previous_request = app('request')->create($previous_url);
        $query = $previous_request->query();
        $route_name = app('router')->getRoutes()->match($previous_request)->getName();
        $segments = $previous_request->segments();
        if (array_key_exists($lang, config('translatable.locales'))) {
            if ($route_name && Lang::has('routes.'.$route_name, $lang)) {
                if (count($query)) {
                    return redirect()->to($lang . '/' .  trans('routes.' . $route_name, [], $lang) . '?' . http_build_query($query));
                }
                return redirect()->to($lang . '/' .  trans('routes.' . $route_name, [], $lang));
            }
            $segments[0] = $lang;
            if (count($query)) {
                return redirect()->to(implode('/', $segments).'?'.http_build_query($query));
            }
            return redirect()->to(implode('/', $segments));
        }
        return redirect()->back();
     }
}
