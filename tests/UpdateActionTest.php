<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\DeleteAction;
use WabLab\Module\Standard\Test\MockBuilder\DeleteActionMockBuilder;

class DeleteActionTest extends TestCase
{
    protected CreateActionMockBuilder $actionBuilder;

    public function setUp(): void
    {
        $this->actionBuilder = new CreateActionMockBuilder();
    }

    public function tearDown(): void
    {
    }

    public function testInitializeClass()
    {
        $createAction = $this->actionBuilder->build();
        $this->assertInstanceOf(CreateAction::class, $createAction);
    }

    public function testSaveEntityShouldReturnSelfReference()
    {
        $createAction = $this->actionBuilder
            ->withDummyRepository()
            ->withDummyEntity()
            ->build();

        $this->assertInstanceOf(CreateAction::class, $createAction->saveEntity());
    }


    public function testSaveEntityShouldCallRepositorySaveFunctionOnce()
    {
        $createAction = $this->actionBuilder
            ->withDummyRepository()
            ->withDummyEntity()
            ->repositorySaveShouldBeCalledOnce()
            ->build();
        $this->assertInstanceOf(CreateAction::class, $createAction->saveEntity());
        $this->actionBuilder->close();
    }

    public function testReturnEntityShouldReturnSelfReference()
    {
        $createAction = $this->actionBuilder->build();
        $this->assertInstanceOf(CreateAction::class, $createAction->returnEntity($returnEntity));
    }

    public function testReturnEntityParameterReturnOfTypeEntity()
    {
        $createAction = $this->actionBuilder->withDummyEntity()->build();
        $createAction->returnEntity($returnEntity);
        $this->assertInstanceOf(Entity::class, $returnEntity);
    }

    public function testReturnEntityParameterReturnOfTypeNull()
    {
        $createAction = $this->actionBuilder->build();
        $createAction->returnEntity($returnEntity);
        $this->assertNull($returnEntity);
    }
}
