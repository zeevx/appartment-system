<?php

namespace App\Providers;

use App\Models\Advert;
use App\Models\Event;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $id = Auth::id();
        $notice = Notice::select("*")->where('user_id',$id)->orWhere('user_id','0')->whereStatus(0)->get();
        $events = Event::all();
        $count_unread_notices = !empty($notice) ? count($notice) : '0';
        $ads = Advert::all();
        $tenants = '';
        $clients = '';

        view()->share('count_unread_notices', $count_unread_notices);
        view()->share('events', $events);
        view()->share('ads', $ads);
    }
}
