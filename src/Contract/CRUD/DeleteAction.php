<?php 
namespace WabLab\Module\Standard\CRUD;

use WabLab\Module\Standard\Contract\Entity;

interface DeleteAction 
{
    public function fetchSavedEntity(): static;
    public function deleteEntity(): static;
    public function returnStatus(bool &$status): static;
}