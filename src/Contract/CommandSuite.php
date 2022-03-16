<?php

namespace WabLab\Module\Standard\Contract;

use WabLab\Module\Standard\Contract\Input\Filter;
use WabLab\Module\Standard\Contract\Input\Validator;

interface CommandSuite
{
    public function getCommand():Command;

    public function getAction():Action;

    public function getInputsValidator():?Validator;

    public function getInputsFilter():?Filter;
}
