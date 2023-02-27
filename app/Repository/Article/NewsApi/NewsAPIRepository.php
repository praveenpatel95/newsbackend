<?php

namespace App\Repository\Article\NewsApi;

use App\Exceptions\BadRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NewsAPIRepository implements NewApiInterface
{
    private $NEWS_API_KEY = "12f4bfdb18fd41bbb3defcf49e0cc67c";
    private $endPoint = "https://newsapi.org/v2";

    public function getArticles(array $params): array|string
    {
        try {


            $client = new Client();
            $request = new Request("GET", $this->endPoint . "/everything");
            $response = $client->send($request, [
                'query' => [
                    'apiKey' => $this->NEWS_API_KEY,
                    'q' => isset($params['q']) ? $params['q'] : '',
                    'pageSize' => $params['pageSize'],
                    'page' => $params['page'],
                    'sources' => isset($params['sources']) ? $params['sources'] : '',
                    'from' => isset($params['from']) ? date('Y-m-d', strtotime($params['from'])) : '',
                    'to' => isset($params['to']) ? date('Y-m-d', strtotime($params['to'])) : '',
                ]
            ]);
            $body = $response->getBody();
            $jsonResponse = $body->getContents();
            return json_decode($jsonResponse, true);
        } catch (\Exception $exception) {
            throw new BadRequestException($exception->getMessage());
        }
    }

    public function getSources(): array|string
    {
        try {
            $client = new Client();
            $request = new Request("GET", $this->endPoint . "/top-headlines/sources");
            $response = $client->send($request, [
                'query' => [
                    'apiKey' => $this->NEWS_API_KEY,
                ]
            ]);
            $body = $response->getBody();
            $jsonResponse = $body->getContents();
            return json_decode($jsonResponse, true);
        } catch (\Exception $exception) {
            throw new BadRequestException($exception->getMessage());
        }
    }
}
