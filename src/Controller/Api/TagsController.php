<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Http\Response;

class TagsController extends ApiController
{
    public string $model = 'Tags';

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    public function index()
    {

    }

    public function add(): Response
    {
        $this->request->allowMethod(['post']);

        $tagEntity = $this->{$this->model}->newEmptyEntity();
        $tagEntity = $this->{$this->model}->patchEntity($tagEntity, $this->request->getData());

        $this->viewBuilder()->setOption('serialize', ['message']);

        try {
            $added = $this->{$this->model}->save($tagEntity);

            if (!$added) {
                return $this->returnError(
                    'Erro ao salvar o registro. Verifique os dados.',
                    $tagEntity->getErrors()
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
