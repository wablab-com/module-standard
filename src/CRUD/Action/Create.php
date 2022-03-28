<?php

namespace WabLab\Module\Standard\CRUD\Action;

use WabLab\Module\Standard\Contract\CRUD\CreateAction;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;

abstract class Create implements CreateAction
{
    protected ?Entity $entity = null;
    protected Repository $repository;
    
    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }
    
    public function saveEntity(): static {
        $this->repository->save($this->entity);
        return $this;
    }
    
    public function returnEntity(?Entity &$entity): static {
        $entity = $this->entity;
        return $this;
    }
}
