<?php 
namespace WabLab\Module\Standard\CRUD;

use WabLab\Module\Standard\Contract\Entity;

interface CreateAction 
{
    // Unit-test will be done in the concrete class since this method is related to it's own functionality
    public function createNewEntity(): static;
    // Unit-test will be done in the concrete class since this method is related to it's own functionality
    public function fillInputsIntoEntity(): static;
    
    // Unit-test will be done using the abstract class since both below are the same with all of the actions
    public function saveEntity(): static;
    public function returnEntity(?Entity &$entity): static;
}