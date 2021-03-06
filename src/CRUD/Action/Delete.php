<?php

namespace WabLab\Module\Standard\CRUD\Action;

use WabLab\Module\Standard\Contract\CRUD\DeleteAction;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;

abstract class Delete implements DeleteAction
{

    protected ?Entity $entity = null;
    protected Repository $repository;
    protected bool $status = false;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function deleteEntity(): static
    {
        $this->status = $this->repository->delete($this->entity);
        return $this;
    }

    public function returnStatus(?bool &$status): static
    {
        $status = $this->status;
        return $this;
    }

}
