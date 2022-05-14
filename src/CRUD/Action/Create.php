<?php

namespace WabLab\Module\Standard\CRUD\Action;

use WabLab\Module\Standard\Contract\CRUD\CreateAction;

abstract class Create implements CreateAction
{
    use CreateOrUpdateTrait;
}
