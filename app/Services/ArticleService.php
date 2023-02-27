<?php

namespace App\Services;

use App\Repository\Article\NewsApi\NewApiInterface;
use App\Repository\Article\NyTimes\NyTimesInterface;
use App\Repository\Article\TheGuardian\TheGuardianInterface;

class ArticleService
{
    protected NewApiInterface $newApiInterface;
    protected TheGuardianInterface $theGuardianInterface;
    protected NyTimesInterface $nyTimesInterface;

    public function __construct(
        NewApiInterface      $newApiInterface,
        TheGuardianInterface $theGuardianInterface,
        NyTimesInterface     $nyTimesInterface
    )
    {
        $this->newApiInterface = $newApiInterface;
        $this->theGuardianInterface = $theGuardianInterface;
        $this->nyTimesInterface = $nyTimesInterface;
    }

    /**
     * @param array $params
     * @return array|string
     */
    public function getNewsAPIData(array $params): array|string
    {
        return $this->newApiInterface->getArticles($params);
    }

    /**
     * @return array|string
     */

    public function getNewsAPISources(): array|string
    {
        return $this->newApiInterface->getSources();
    }

    /**
     * @param array $params
     * @return array|string
     */

    public function getTheGuardianData(array $params): array|string
    {
        return $this->theGuardianInterface->getArticles($params);
    }

    /**
     * @return array|string
     */
    public function getTheGuardianSections(): array|string
    {
        return $this->theGuardianInterface->getSections();
    }

    /**
     * @param array $params
     * @return array|string
     */
    public function getNyTimesData(array $params): array|string
    {
        return $this->nyTimesInterface->getArticles($params);
    }
}
