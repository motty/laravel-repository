Laravel - Repository Design Pattern Implementation
---

## Installation

Run the following command from you terminal:

 ```bash
 composer require motty/laravel-repository:~0.1.0
 ```

or add this to require section in your composer.json file:

 ```
"motty/laravel-repository: ~0.1.0"
 ```

then run ```composer update```

## Available Methods

The following methods are available:

##### Motty\Laravel\Repository\Contracts\Repository

```php
public function all($columns = ['*']);
public function lists($value, $key = null);
public function paginate($perPage = 15, $columns = ['*']);
public function findBy($attribute, $value, $columns = ['*']);
public function findManyBy($attribute, $value, $columns = ['*']);
```

##### Motty\Laravel\Repository\Contracts\Model

```php
public function newQuery();
```

##### Motty\Laravel\Repository\Contracts\EagerLoading

```php
public function with($relations);
```

##### Motty\Laravel\Repository\Contracts\Crudable

```php
public function create(array $attributes);
public function find($id, array $columns = ['*']);
public function update(array $data, $id, $attribute = 'id');
public function delete($ids = null);
```

##### Motty\Laravel\Repository\Contracts\Criteria

```php
public function skipCriteria($status = true);
public function getCriteria();
public function getByCriteria(BaseCriteria $criteria);
public function pushCriteria(BaseCriteria $criteria);
public function applyCriteria();
```

## Tip and Tricks

If you wanna use `joins` just create them as a criteria and inject it into the repository

> Note: this could help with any other complex query
