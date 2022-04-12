<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Test\MockBuilder\DeleteActionMockBuilder;
use WabLab\Module\Standard\CRUD\Action\Delete as DeleteAction;

class DeleteActionTest extends TestCase
{
    protected DeleteActionMockBuilder $actionBuilder;

    public function setUp(): void
    {
        $this->actionBuilder = new DeleteActionMockBuilder();
    }

    public function tearDown(): void
    {
    }

    public function testInitializeClass()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf(DeleteAction::class, $action);
    }

    public function testDeleteEntityShouldReturnSelfReference()
    {
        $action = $this->actionBuilder->withDummyEntity()->withDummyRepository()->build();
        $this->assertInstanceOf(DeleteAction::class, $action->deleteEntity());
    }

    public function testDeleteEntityShouldPassEntityObjectToRepository()
    {
        $action = $this->actionBuilder->withDummyEntity()->withDummyRepository()->repositoryDeleteShouldBeCalledOnce()->build();
        $this->assertInstanceOf(DeleteAction::class, $action->deleteEntity());
        $this->actionBuilder->close();
    }

    public function testReturnStatusMethodShouldReturnSelfReference()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf(DeleteAction::class, $action->returnStatus());
    }

}
