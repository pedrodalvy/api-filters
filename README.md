## API REST com filtro e condições na rota
Projeto básico, em Laravel, criado para demostração de como utilizar filtros 
e condições através da rota, utilizando QueryString.

## Descrição
Foi criado uma classe abstrata AbstractRepository, contendo os métodos para
serem utilizados em condições e filtros.

## Utilização da classe AbstractRepository
- Extender a classe em um repository.

## Consultas utilizando condições:
- Utilizar o metodo `selectConditions`, passando as condições no parâmetro.
- O formato das condições devem seguir este exemplo: `age:>:18;name:like:%silva%`".
- Para obter o retorno da consulta, deve ser utilizado o método `getResult`, que retornará a model com os dados buscados.

##### Exemplo de utilização no controller:
 ``` php
 public function index(Request $request)
 {
     $conditions = $request->get('conditions');
     if ($conditions) {
         $this->repository->selectConditions($conditions);
     }
 
     return $this->repository->getResult();
 }
 ```

##### Exemplo de utilização na rota:
```
http://nomedosite/api/exemplo?conditions=name:like:$silva$;age:>:18
```

## Consultas utilizando filtros:
- Utilizar o metodo `selectFilter`, passando as colunas no parâmetro.
- O formato do filtro deve seguir o exemplo: `id,name,age`.
- Para obter o retorno da consulta, deve ser utilizado o método `getResult`, que retornará a model com os dados buscados.


##### Exemplo de utilização no controller:
 ``` php
 public function index(Request $request)
 {
     $fields = $request->get('fields');
     if ($fields) {
         $this->repository->selectFilter($fields);
     }
 
     return $this->repository->getResult();
 }
 ```

##### Exemplo de utilização na rota:
```
http://nomedosite/api/exemplo?filters=id,name,age
```
