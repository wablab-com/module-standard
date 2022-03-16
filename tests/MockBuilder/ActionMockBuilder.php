<?php

namespace WabLab\Module\Standard\Test\MockBuilder;


abstract class ActionMockBuilder extends MockBuilder
{

    protected \Mockery\Mock|CreateAction $actionMock;

    public function __construct(string $actionClassName = CreateAction::class)
    {
        $this->actionMock = \Mockery::mock($actionClassName)->makePartial();
    }

    public function build(): \Mockery\Mock|CreateAction
    {
        return $this->actionMock;
    }
}