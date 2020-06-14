<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Faz uma pesquisa com condições
     * Exemplo de QueryString "conditions=name:like:%test%;slug:>:18"
     * @param string $conditions
     */
    public function selectConditions(string $conditions): void
    {
        $expressions = explode(';', $conditions);
        foreach ($expressions as $expression) {
            $expression = explode(':', $expression);

            $this->model = $this->model->where(
                $expression[0],
                $expression[1],
                $expression[2]
            );
        }
    }

    /**
     * Seleciona apenas as colunas informadas no filtro
     * Exemplo de QueryString "fields=name,slug"
     * @param string $filters
     */
    public function selectFilter(string $filters): void
    {
        $this->model = $this->model->selectRaw($filters);
    }

    /**
     * Retorna o model
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getResult()
    {
        return $this->model;
    }
}
