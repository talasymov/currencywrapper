<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\API\Currency\HistoryService;
use App\Services\API\Currency\LatestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a latest currency.
     *
     * @param Request $request
     * @param LatestService $service
     * @return JsonResponse
     */
    public function latest(Request $request, LatestService $service)
    {
        $validated = $service->validate($request->all());

        if ($validated->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validated->errors()
            ]);
        }

        return response()->json($service->handle());
    }

    /**
     * Display a currency history
     *
     * @param Request $request
     * @param HistoryService $service
     * @return JsonResponse
     */

    public function history(Request $request, HistoryService $service)
    {
        $validated = $service->validate($request->all());

        if ($validated->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validated->errors()
            ]);
        }

        return response()->json($service->handle());
    }
}
