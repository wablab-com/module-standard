<?php 
namespace WabLab\Module\Standard\Contract\CRUD;

use WabLab\Module\Standard\Contract\Action;
use WabLab\Module\Standard\Contract\Entity;

interface UpdateAction extends Action
{
    public function fetchSavedEntity(): static;
    public function fillInputsIntoEntity(): static;
    public function saveEntity(): static;
    public function returnEntity(Entity &$entity): static;
}