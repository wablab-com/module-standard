<?php

namespace WabLab\Module\Standard\CRUD\Action;

use WabLab\Module\Standard\Contract\CRUD\ReadAction;
use WabLab\Module\Standard\Contract\Entity;

abstract class Read implements ReadAction
{
    protected ?Entity $entity = null;

    public function returnEntity(?Entity &$entity): static
    {
        $entity = $this->entity;
        return $this;
    }
}
