<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\DB;

class HealthController
{
    public function __invoke()
    {
        try {
            DB::connection()->getPdo();

            return response()->json([
                'status' => 'ok',
                'service' => 'automitra-api',
                'database' => 'connected',
            ]);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'status' => 'degraded',
                'service' => 'automitra-api',
                'database' => 'unavailable',
            ], 503);
        }
    }
}
