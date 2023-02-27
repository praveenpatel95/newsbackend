<?php

namespace App\Repository\Article\TheGuardian;

use App\Exceptions\BadRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class TheGuardianRepository implements TheGuardianInterface
{
    private $API_KEY = 'test';
    private $endPoint = "https://content.guardianapis.com";


    public function getArticles(array $params): array|string
    {
        try {

            $client = new Client();
            $request = new Request("GET", $this->endPoint . "/search");

            $customParams = [];
            if (isset($params['from']) && isset($params['to'])) {
                $customParams += [
                    'from-date' => date('Y-m-d', strtotime($params['from'])),
                    'to-date' => date('Y-m-d', strtotime($params['to'])),
                ];
            }

            if (isset($params['section'])) {
                $customParams += [
                    'section' => str_replace(',', '|', $params['section'])
                ];
            }
            $response = $client->send($request, [
                'query' => [
                        'api-key' => $this->API_KEY,
                        'q' => isset($params['q']) ? $params['q'] : '',
                        'page' => $params['page'],

                    ] + $customParams
            ]);
            $body = $response->getBody();
            $jsonResponse = $body->getContents();
            return json_decode($jsonResponse, true);
        } catch (\Exception $exception) {
            throw new BadRequestException($exception->getMessage());
        }
    }

    public function getSections(): array|string
    {
        try {

            $client = new Client();
            $request = new Request("GET", $this->endPoint . "/sections");
            $response = $client->send($request, [
                'query' => [
                    'api-key' => $this->API_KEY,
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
