<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Support\Facades\View;
class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data['settings']=Settings::all();
        foreach ($data['settings'] as $key)
        {
            $settings[$key->settings_key]=$key->settings_value;
        }

        $page=Pages::all()->sortBy('pages_must')->first();
        $settings['slug']=$page['pages_slug'];
        View::share($settings);
        return $next($request);
    }
}
