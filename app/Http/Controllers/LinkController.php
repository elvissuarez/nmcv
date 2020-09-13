<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use JJG\Ping;

class LinkController extends Controller
{
    /**
     * Show the current health of a given URL.
     *
     * @param  string  $url
     * @return string
     */
    public function healthCheck($host = 'localhost')
    {
        $health = new Ping($host);
        $latency = $health->ping();
        if ($latency !== false) {
            return 'Latency is ' . $latency . ' ms';
        }
        else {
            return 'Host could not be reached.';
        }
    }
}
