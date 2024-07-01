<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Response;

class ApiController extends AppController
{
    protected function returnError(string $message, array $errors = []): Response
    {
        $this->autoRender = false;

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'success' => false,
                'message' => $message,
                'errors' => $errors,
            ]));
    }

    protected function returnSuccess(string $message): Response
    {
        $this->autoRender = false;

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'message' => $message,
            ]));
    }
}
