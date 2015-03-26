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
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create(array $attributes = array());

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
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
}