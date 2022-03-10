<?php 
namespace WabLab\Module\Standard\CRUD;

use WabLab\Module\Standard\Contract\Entity;

interface CreateAction 
{
    public function createNewEntity(): static;
    public function fillInputsIntoEntity(): static;
    public function saveEntity(): static;
    public function returnEntity(Entity &$entity): static;
}