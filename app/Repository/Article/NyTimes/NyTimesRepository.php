<?php

namespace App\Repository\Article\NyTimes;

use App\Exceptions\BadRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NyTimesRepository implements NyTimesInterface
{
    private $API_KEY = 'ue9tiTjKsA3JEaXABBBCtQ9LF6AKmUAY';
    private $endPoint = "https://api.nytimes.com/svc/search/v2";


    public function getArticles(array $params): array|string
    {
        try {

            $client = new Client();
            $request = new Request("GET", $this->endPoint . "/articlesearch.json");

            $customParams = [];
            if (isset($params['from']) && isset($params['to'])) {
                $customParams = [
                    'begin_date' => date('Y-m-d', strtotime($params['from'])),
                    'to-end_date' => date('Y-m-d', strtotime($params['to'])),
                ];
            }

            $response = $client->send($request, [
                'query' => [
                    'api-key' => $this->API_KEY,
                    'q' => $params['q'],
                    'sort' => isset($params['sort']) ? $params['sort'] : '',
                    'page' => $params['page'],
                ]+$customParams
            ]);
            $body = $response->getBody();
            $jsonResponse = $body->getContents();
            return json_decode($jsonResponse, true);
        } catch (\Exception $exception) {
            throw new BadRequestException($exception->getMessage());
        }
    }

}
