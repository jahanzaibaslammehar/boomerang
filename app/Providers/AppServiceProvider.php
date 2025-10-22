<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('sendResponse', function ($responseType, $code, $message, $data, $status = HttpResponse::HTTP_BAD_REQUEST) {

            if ($responseType == 'SUCCESS') {
                return response()->json([
                    'code'      =>  $code,
                    'message'   =>  $message,
                    'data'      =>  $data
                ]);
            } else if ($responseType == 'ERROR') {
                return response()->json([
                    'code'      =>  $code,
                    'message'   =>  $message,
                    'error'     =>  [$data]
                ], $status);
            } else {
                return response()->json([
                    'code'  =>  0,
                    'messge'    =>  'invalid response type',
                ], $status);
            }
        });
    }
}
