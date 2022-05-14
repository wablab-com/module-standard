<?php

namespace WabLab\Module\Standard\Test;

use PHPUnit\Framework\TestCase;
use WabLab\Module\Standard\Contract\CRUD\UpdateAction as ActionInterface;
use WabLab\Module\Standard\Test\MockBuilder\UpdateActionMockBuilder;
use WabLab\Module\Standard\CRUD\Action\Update as Action;

class UpdateActionTest extends TestCase
{
    use CreateOrUpdateActionTestTrait;

    protected string $actionClass = Action::class;
    protected string $actionInterface = ActionInterface::class;
    protected UpdateActionMockBuilder $actionBuilder;

    public function setUp(): void
    {
        $this->actionBuilder = new UpdateActionMockBuilder();
    }

}
