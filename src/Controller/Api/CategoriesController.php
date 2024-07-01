<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Http\Response;

class CategoriesController extends ApiController
{
    public string $model = 'Categories';

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function add(): Response
    {
        $this->request->allowMethod(['post']);

        $categoryEntity = $this->{$this->model}->newEmptyEntity();
        $categoryEntity = $this->{$this->model}->patchEntity($categoryEntity, $this->request->getData());

        $this->viewBuilder()->setOption('serialize', ['message']);

        try {
            $added = $this->{$this->model}->save($categoryEntity);

            if (!$added) {
                return $this->returnError(
                    'Erro ao salvar o registro. Verifique os dados.',
                    $categoryEntity->getErrors()
                )->withStatus(422);
            }

            return $this->returnSuccess('Registro adicionado com sucesso');
        } catch (\Exception $e) {
            return $this->returnError(
                'Houve um problema ao adicionar o registro.',
                $e->getMessage()
            );
        }
    }
}
