<?php

namespace WabLab\Module\Standard\CRUD\Action;

use WabLab\Module\Standard\Contract\CRUD\UpdateAction;

abstract class Update implements UpdateAction
{
    use CreateOrUpdateTrait;
}
