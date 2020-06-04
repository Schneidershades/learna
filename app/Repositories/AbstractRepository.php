<?php


namespace App\Repositories;

use App\Exceptions\NoResultException;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class AbstractRepository implements RepositoryInterface
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->getModel()->all();
    }

    /**
     * Find an entity by id.
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * A method for fetching an entity by field values.
     *  - $criteria will access an associated array with the columns => value
     * pair.
     *
     * @param array $criteria
     * @param null $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria, $limit = null, $offset = 0): Collection
    {
        if (empty($criteria)) {
            throw new \InvalidArgumentException(
                'paramter $criteria cannot be an empty array.'
            );
        }
        return $this->getModel()
            ->where($criteria)
            ->forPage($offset, $limit)
            ->get();
    }

    /**
     * Find a model by criteria and fail if not found.
     *
     * @param array $criteria
     * @param null $limit
     * @param int $offset
     * @return mixed
     * @throws NoResultException
     */

    public function findByOrFail(array $criteria, int $limit = 1, int $offset = 0)
    {
        if (empty($criteria)) {
            throw new \InvalidArgumentException(
                'paramter $criteria cannot be an empty array.'
            );
        }

        $result = $this->getModel()
            ->where($criteria)
            ->limit($limit)
            ->offset($offset)
            ->get();

        if ($result->isEmpty()) {
            throw new NoResultException(
                sprintf("Empty result %s", get_class($this->getModel()))
            );
        }

        return $result;
    }

    /**
     * Save a model.
     *
     * @param Model $model
     * @return bool
     * @throws \Throwable
     */
    public function save(Model $model): bool
    {
        return $model->saveOrFail();
    }

    public function update(Model $model): bool
    {
        return $model->update();
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Delete an entity by model Id.
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id)
    {
        $model = $this->find($id);

        return $this->delete($model);
    }

    /**
     * Delete by criteria. Pass associative array of `columns => value`
     *
     * @param array $condition
     * @return bool
     */
    public function deleteByCriteria(array $condition): bool
    {
        return $this->getModel()->where($condition)->delete();
    }

    /**
     * Update entity by condition and replacement values.
     *
     * @param array $condition
     * @param array $replacementValue
     * @return int
     */
    public function updateBy(array $condition, array $replacementValue): int
    {
        if (empty($condition)) {
            throw new \InvalidArgumentException('$condition cannot be empty');
        }

        if (empty($replacementValue)) {
            throw new \InvalidArgumentException('$replacementValue cannot be empty');
        }

        return $this->getModel()->where($condition)->update($replacementValue);
    }

    protected function getModel(): Model
    {
        return new $this->model;
    }

    public function getColumns($table)
    {       
        $columns = Schema::getColumnListing($table);
        return $columns;
    }
}
