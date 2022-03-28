<?php

namespace WabLab\Module\Standard\Test\MockBuilder;


abstract class ActionMockBuilder extends MockBuilder
{

    protected $actionMock;

    public function __construct(string $actionClassName)
    {
        $this->actionMock = \Mockery::mock($actionClassName)->makePartial();
    }

    public function build()
    {
        return $this->actionMock;
    }
}