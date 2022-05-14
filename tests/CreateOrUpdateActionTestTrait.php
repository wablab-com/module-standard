<?php

namespace WabLab\Module\Standard\Test;

use WabLab\Module\Standard\Contract\Entity;

trait CreateOrUpdateActionTestTrait
{

    public function testInitializeClass()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf($this->actionClass, $action);
    }

    public function testSaveEntityShouldReturnSelfReference()
    {
        $action = $this->actionBuilder
            ->withDummyRepository()
            ->withDummyEntity()
            ->build();

        $this->assertInstanceOf($this->actionClass, $action->saveEntity());
    }

    public function testSaveEntityShouldCallRepositorySaveFunctionOnce()
    {
        $action = $this->actionBuilder
            ->withDummyRepository()
            ->withDummyEntity()
            ->repositorySaveShouldBeCalledOnce()
            ->build();
        $this->assertInstanceOf($this->actionClass, $action->saveEntity());
        $this->actionBuilder->close();
    }

    public function testReturnEntityShouldReturnSelfReference()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf($this->actionClass, $action->returnEntity($returnEntity));
    }

    public function testReturnEntityParameterReturnOfTypeEntity()
    {
        $action = $this->actionBuilder->withDummyEntity()->build();
        $action->returnEntity($returnEntity);
        $this->assertInstanceOf(Entity::class, $returnEntity);
    }

    public function testReturnEntityParameterReturnOfTypeNull()
    {
        $action = $this->actionBuilder->build();
        $action->returnEntity($returnEntity);
        $this->assertNull($returnEntity);
    }

    public function testClassShouldImplementActionInterface()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf($this->actionInterface, $action);
    }
}
