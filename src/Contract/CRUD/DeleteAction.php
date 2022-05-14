<?php 
namespace WabLab\Module\Standard\Contract\CRUD;

use WabLab\Module\Standard\Contract\Action;
use WabLab\Module\Standard\Contract\Entity;

interface DeleteAction  extends Action
{
    public function fetchSavedEntity(): static;
    public function deleteEntity(): static;
    public function returnStatus(?bool &$status): static;
}