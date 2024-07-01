<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Response;

class ApiController extends AppController
{
    protected function returnError(string $msg, array $errors): Response
    {
        $this->autoRender = false;

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'error' => $msg,
                'message' => $errors,
            ]));
    }

    protected function returnSuccess(string $msg): Response
    {
        $this->autoRender = false;

        return $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'message' => $msg,
            ]));
    }
}
