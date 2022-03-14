<?php 
namespace WabLab\Module\Standard\Contract\CRUD;

use WabLab\Module\Standard\Contract\Entity;

interface ReadAction 
{
    public function fetchSavedEntity(): static;    
    public function returnEntity(Entity &$entity): static;
}