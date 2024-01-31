<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\UrlClick;
use Stevebauman\Location\Facades\Location;

class UrlController extends Controller
{
    public function shortenLink($short)
    {
        $find = Url::where('shortener_url', $short)->first();
        $ip = request()->getClientIp();
        $location = Location::get($ip);
        $url = new UrlClick();
        $url->url_id = $find->id;
        $url->ip = $ip;
        $url->location = json_encode($location);
        $url->save();
        return redirect($find->original_url);
    }
}


