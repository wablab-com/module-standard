<?php

namespace WabLab\Module\Standard\Test\MockBuilder;


use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;
use WabLab\Module\Standard\CreateAction;

class CreateActionMockBuilder
{

    private Repository|\Mockery\LegacyMockInterface|\Mockery\MockInterface $repository;
    private \Mockery\Mock|CreateAction $mock;

    public function __construct()
    {
        $this->mock = \Mockery::mock(CreateAction::class)->makePartial();
    }

    public function withDummyRepository():static
    {
        $this->repository = \Mockery::mock(Repository::class)->shouldIgnoreMissing();
        $this->setProperty($this->mock, 'repository', $this->repository);
        return $this;
    }

    public function repositorySaveShouldBeCalledOnce():static
    {
        $this->repository->shouldReceive('save')->once();
        return $this;
    }

    public function withDummyEntity():static
    {
        $this->setProperty($this->mock, 'entity', \Mockery::mock(Entity::class));
        return $this;
    }

    public function build(): \Mockery\Mock|CreateAction
    {
        return $this->mock;
    }

    public function close():void
    {
        \Mockery::close();
    }

    protected function setProperty($object, $property, $value) {
        $reflection = new \ReflectionClass($object);
        $reflection_property = $reflection->getProperty($property);
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($object, $value);
    }
}
