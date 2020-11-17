<?php

namespace App\Services\Interfaces;

interface dosenServiceInterface
{
    public function get($request);
    public function count($request);
    public function create($request);
    public function find(int $id);
    public function update($request, int $id);
    public function status(int $id);
    public function position(int $id, int $position, int $parent);
    public function delete(int $id);
    /**media */
    public function getMedia(int $pageId);
    public function createMedia($request, int $pageId);
    public function updateMedia($request, int $id);
    public function positionMedia(int $id, int $position, int $pageId);
    public function sortMedia(int $id, $position);
    public function deleteMedia(int $id);
    /**read */
    public function read(int $id);
    public function child(int $parent, $limit);
    public function search($request);
    public function media(int $pageId, $limit);
    public function viewer(int $id);
}