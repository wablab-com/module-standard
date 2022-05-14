<?php

namespace WabLab\Module\Standard\Test\MockBuilder;

use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;
use WabLab\Module\Standard\CRUD\Action\Read as ReadAction;

/**
 * @method ReadAction build()
 */
class ReadActionMockBuilder extends ActionMockBuilder
{

    protected Repository|\Mockery\LegacyMockInterface|\Mockery\MockInterface $repository;

    public function __construct(string $actionClassName = ReadAction::class)
    {
        parent::__construct($actionClassName);
    }

    public function withDummyEntity(): static
    {
        $this->setProperty($this->actionMock, 'entity', \Mockery::mock(Entity::class));
        return $this;
    }

}
