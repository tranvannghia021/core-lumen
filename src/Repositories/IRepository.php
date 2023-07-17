<?php
namespace Devtvn\Social\Repositories;
interface IRepository
{
    /**
     * Get all
     * @return array|object
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return array|object
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return array|object
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return array|object
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return bool
     */
    public function delete($id);

    /**
     * updateOrInsert
     * @param array $conditions
     * @param array $attributes
     * @return array|object
     */
    public function updateOrInsert(array $conditions,array $attributes);

    /**
     * @param array $conditions
     * @param array $select
     * @return mixed
     */
    public function findBy(array $conditions , array $select);
}
