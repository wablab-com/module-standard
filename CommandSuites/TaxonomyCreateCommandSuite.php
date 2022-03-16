<?php

class TaxonomyCreateCommandSuite implements \WabLab\Module\Standard\Contract\CommandSuite
{

    public function getCommand(): \WabLab\Module\Standard\Contract\Command
    {
        return new CreateCommand(
            $this->getAction()
        );
    }

    public function getInputsValidator(): ?\WabLab\Module\Standard\Contract\Input\Validator
    {
        return new CreateInputsValidor();
    }

    public function getInputsFilter(): ?\WabLab\Module\Standard\Contract\Input\Filter
    {
        return new CreateInputsFilter();
    }

    public function getAction(): \WabLab\Module\Standard\Contract\Action
    {
        return new CreateAction($this->getInputsFilter(), $this->getInputsValidator());
    }


}