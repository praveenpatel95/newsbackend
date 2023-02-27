<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiResponse;

    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Get articles from News API
     * @param Request $request
     * @return JsonResponse
     */

    public function getNewsAPIData(Request $request): JsonResponse
    {
        return $this->success($this->articleService->getNewsAPIData($request->all()));
    }

    /**
     * Get News API sources list
     * @return JsonResponse
     */
    public function getNewsAPISources(): JsonResponse
    {
        return $this->success($this->articleService->getNewsAPISources());
    }

    /**
     * Get Articles from The Guardian API
     * @param Request $request
     * @return JsonResponse
     */
    public function getTheGuardianData(Request $request): JsonResponse
    {
        return $this->success($this->articleService->getTheGuardianData($request->all()));
    }

    /**
     * Get Soruces from The Guardian API
     * @return JsonResponse
     */
    public function getTheGuardianSections(): JsonResponse
    {
        return $this->success($this->articleService->getTheGuardianSections());
    }

    /**
     * Get Articles from New york times API
     * @param Request $request
     * @return JsonResponse
     */
    public function getNyTimesData(Request $request): JsonResponse
    {
        return $this->success($this->articleService->getNyTimesData($request->all()));
    }


}
