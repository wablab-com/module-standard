<?php

namespace WabLab\Module\Standard\Test\MockBuilder;

use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;
use WabLab\Module\Standard\CRUD\Action\Create as CreateAction;

/**
 * @method CreateAction build()
 */

class CreateActionMockBuilder extends ActionMockBuilder
{

    protected Repository|\Mockery\LegacyMockInterface|\Mockery\MockInterface $repository;

    public function __construct(string $actionClassName = CreateAction::class)
    {
        parent::__construct($actionClassName);
    }

    public function withDummyRepository(): static
    {
        $this->repository = \Mockery::mock(Repository::class)->shouldIgnoreMissing();
        $this->setProperty($this->actionMock, 'repository', $this->repository);
        return $this;
    }

    public function repositorySaveShouldBeCalledOnce(): static
    {
        $this->repository->shouldReceive('save')->once();
        return $this;
    }

    public function withDummyEntity(): static
    {
        $this->setProperty($this->actionMock, 'entity', \Mockery::mock(Entity::class));
        return $this;
    }

}
