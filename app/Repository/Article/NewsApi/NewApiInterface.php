<?php

namespace App\Repository\Article\NewsApi;

interface NewApiInterface
{
    function getArticles(array $params) : array | string;
    function getSources() : array | string;

}
