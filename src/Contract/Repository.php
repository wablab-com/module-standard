<?php 
namespace WabLab\Module\Standard\Contract;

use WabLab\Module\Standard\Contract\Entity;

interface Repository 
{
    public function getById(mixed $id) : Entity;
    public function delete(Entity $entity) : bool;
    public function save(Entity $entity) : bool;
}