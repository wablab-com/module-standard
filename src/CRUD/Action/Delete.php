<?php

namespace WabLab\Module\Standard\CRUD\Action;


use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;

class Delete
{

    protected ?Entity $entity = null;
    protected Repository $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }

    public function deleteEntity(): static
    {
        $this->repository->delete($this->entity);
        return $this;
    }

}
