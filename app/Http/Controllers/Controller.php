<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function lang($lang)
    {
        if (!in_array($lang, ['en', 'hy', 'ru'])) {
            abort(400);
        }

        session()->put('lang', $lang);
        app()->setLocale(session()->get('lang'));

        return response()->json('ok', 200);
    }
}
