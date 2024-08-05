<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CacheController extends Controller
{
    public function index() {
        // Cache::remember('users', 10, function() {
        //     return User::all();
        // });

        // Store if Not Present
        Cache::add('abc', 'okey', 15);

        dump(Cache::get('abc'));

        // store in the cache permanently
        Cache::forever('forever', 'Umrbod keshda qoladi!');

        // delete from the cache
        dump(Cache::forget('forever'));

        // clear entire cache from storage
        dump(Cache::flush());

        /* Cache::add('caching', 1, now()->addSeconds(10));
        
        dump(Cache::decrement('caching'));

        dump(Cache::get('caching', function() {
            return DB::table('users')->get();
        })); */

        if (Cache::has('caching')) {
            echo 'yeap';
        }
        else {
            echo 'nope';
        }
    }
}
