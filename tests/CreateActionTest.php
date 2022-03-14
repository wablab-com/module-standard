<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\Contract\Repository;
use WabLab\Module\Standard\CreateAction;


class CreateActionTest extends TestCase {
    public CreateAction $createAction;
    private Repository|\PHPUnit\Framework\MockObject\MockObject $repositoryMock;
    private Entity|\PHPUnit\Framework\MockObject\MockObject $entityMock;
    
    public function setUp(): void {
        $this->entityMock = $this->getMockForAbstractClass(Entity::class);
        $this->repositoryMock = $this->getMockForAbstractClass(Repository::class);
        $this->createAction = $this->getMockForAbstractClass(CreateAction::class, ['repository' => $this->repositoryMock]);
        $this->setProtectedProperty($this->createAction, 'entity', $this->entityMock);
    }
    
    public function tearDown(): void {
    }
    
    public function testInitializeClass() {
        $this->assertInstanceOf(CreateAction::class, $this->createAction);
    }
    
    public function testSaveEntityShouldReturnSelfReference() {
        $this->assertInstanceOf(CreateAction::class, $this->createAction->saveEntity());
    }
    
    
    public function testSaveEntityShouldCallRepositorySaveFunctionOnce() {
        $this->repositoryMock->expects($this->once())->method('save');
        $this->createAction->saveEntity();
    }
    
    private function setProtectedProperty($object, $property, $value) {
        $reflection = new ReflectionClass($object);
        $reflection_property = $reflection->getProperty($property);
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($object, $value);
    }
    
    public function testReturnEntityShouldReturnSelfReference() {
        $this->assertInstanceOf(CreateAction::class, $this->createAction->returnEntity($returnEntity));
    }
    
    public function testReturnEntityParameterReturnOfTypeEntity() {
        $this->createAction->returnEntity($returnEntity);
        $this->assertInstanceOf(Entity::class, $returnEntity);
    }
    
    public function testReturnEntityParameterReturnOfTypeNull() {
        $this->createAction->returnEntity($returnEntity);
        $this->assertNull($returnEntity);
    }
}
