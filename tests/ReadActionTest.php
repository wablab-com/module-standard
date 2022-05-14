<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Contract\CRUD\ReadAction as ReadActionInterface;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\CRUD\Action\Read as ReadAction;
use WabLab\Module\Standard\Test\MockBuilder\ReadActionMockBuilder;

class ReadActionTest extends TestCase
{
    protected ReadActionMockBuilder $actionBuilder;

    public function setUp(): void
    {
        $this->actionBuilder = new ReadActionMockBuilder();
    }

    public function tearDown(): void
    {
    }

    public function testInitializeClass()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf(ReadAction::class, $action);
    }

    public function testReturnEntityShouldReturnSelfReference()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf(ReadAction::class, $action->returnEntity($returnEntity));
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
        $this->assertInstanceOf(ReadActionInterface::class, $action);
    }
}
