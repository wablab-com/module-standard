<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Contract\CRUD\DeleteAction as DeleteActionInterface;
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
        $this->assertInstanceOf(DeleteAction::class, $action->returnStatus($status));
    }

    public function testReturnStatusMethodShouldPassTheStatusFalseIfDeletionFailed()
    {
        $action = $this->actionBuilder->withDummyEntity()->withDummyRepository()->repositoryDeleteShouldReturnFalse()->build();
        $action->deleteEntity()->returnStatus($status);
        $this->assertFalse($status);
    }

    public function testReturnStatusMethodShouldPassTheStatusTrueIfDeletionSucceeded()
    {
        $action = $this->actionBuilder->withDummyEntity()->withDummyRepository()->repositoryDeleteShouldReturnTrue()->build();
        $action->deleteEntity()->returnStatus($status);
        $this->assertTrue($status);
    }

    public function testDeleteActionObjectImplementsDeleteActionInterface()
    {
        $action = $this->actionBuilder->build();
        $this->assertInstanceOf(DeleteActionInterface::class, $action);
    }
}
