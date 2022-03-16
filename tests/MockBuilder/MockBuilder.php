<?php

namespace WabLab\Module\Standard\Test\MockBuilder;


abstract class MockBuilder
{
    public function close(): void
    {
        \Mockery::close();
    }

    protected function setProperty($object, $property, $value)
    {
        $reflection = new \ReflectionClass($object);
        $reflection_property = $reflection->getProperty($property);
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($object, $value);
    }
}