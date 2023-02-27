<?php

namespace App\Repository\Article\NyTimes;

interface NyTimesInterface
{

    function getArticles(array $params) : array | string;
}
