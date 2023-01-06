<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\APIController;
use Illuminate\Pagination\Paginator;

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
        $ongoing_tournament = (new APIController)->komoAPI_V2('GET', '/v2/tournament/list', ['status' => 'ongoing'])->data;
        $upcoming_tournament = (new APIController)->komoAPI_V2('GET', '/v2/tournament/list', ['status' => 'upcoming'])->data;
        
        $game_list = (new APIController)->komoAPI_V2('GET', '/v2/game', ['orderBy' => 'game_id']);

        $game_data = [];
        foreach ($game_list->data as $row) {
            $game_data[$row->game_id] = $row;
        }
        $sidebar_data = [
            'game_data' => $game_data,
            'tournament_schedule' => [
                'ongoing' => $ongoing_tournament, 
                'upcoming' => $upcoming_tournament,
            ],
        ];
        View::share('sidebar_data', $sidebar_data);
        Paginator::useBootstrap();
    }
}
