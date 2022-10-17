<?php

namespace App\Providers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        // close any sales that are pending dated yesterday and beyond
        // if (DB::connection()->getPdo()){
        //      $pending_loss_sales = Sale::whereDay('created_at','<', Carbon::today())
        //             ->where('status', 'PENDING')->get();
        //      if ($pending_loss_sales->count() > 0){
        //           foreach($pending_loss_sales as $sale){
        //             $sale->markLost();
        //          }
        //      }
        // }
    }
}
