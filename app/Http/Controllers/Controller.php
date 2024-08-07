<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function clearCache() {
        for ($i=1; $i <= 1000; $i++) { 
            $key = 'posts' . $i;

            if (Cache::has($key)) {
                Cache::forget($key);
            }
        }
    }
}
