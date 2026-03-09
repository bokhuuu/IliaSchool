<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutPageResource;
use App\Services\AboutPageService;

class AboutPageController extends Controller
{
    public function index(AboutPageService $service)
    {
        return response()->json([
            'data' => AboutPageResource::make($service->get()),
            'stats' => $service->stats(),
        ]);
    }
}
