<?php

namespace App\Repository\Article\TheGuardian;

interface TheGuardianInterface
{

    function getArticles(array $params) : array | string;
    function getSections() : array | string;
}
