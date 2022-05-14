<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Contract\CRUD\CreateAction as ActionInterface;
use WabLab\Module\Standard\Contract\Entity;
use WabLab\Module\Standard\CRUD\Action\Create as Action;
use WabLab\Module\Standard\Test\MockBuilder\CreateActionMockBuilder;

class CreateActionTest extends TestCase
{
    use CreateOrUpdateActionTestTrait;

    protected string $actionClass = Action::class;
    protected string $actionInterface = ActionInterface::class;
    protected CreateActionMockBuilder $actionBuilder;

    public function setUp(): void
    {
        $this->actionBuilder = new CreateActionMockBuilder();
    }

    public function tearDown(): void
    {
    }


}
