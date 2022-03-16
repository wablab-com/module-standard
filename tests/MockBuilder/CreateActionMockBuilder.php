<?php

namespace WabLab\Module\Standard\Test\MockBuilder;


use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;

class CreateActionMockBuilder extends ActionMockBuilder
{

    protected Repository|\Mockery\LegacyMockInterface|\Mockery\MockInterface $repository;

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
