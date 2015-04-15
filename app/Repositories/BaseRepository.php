<?php
namespace App\Repositories;

interface BaseRepository
{
    /**
     * Get a listing of the resource.
     *
     * @return Response
     */
    public function all();

    /**
     * Get Element By ID
     *
     * @param $id
     * @return object
     */
    public function getElementById($id);

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create(array $attributes = array());

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(array $attributes = array());

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function delete();

    /**
     * Eager loading relations
     *
     * @param $relations
     * @return $this
     */
    public function with($relations);

    /**
     * Find a element
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));

    /**
     * Find By Condition
     * @param $attribute
     * @param $value
     * @param array $columns
     * @param string $condition
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'), $condition = "=");

    /**
     * Get paginate
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'));
}