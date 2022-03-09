<?php 
namespace WabLab\Module\Standard\Contract;

interface App 
{
    public function run(string $commandName, array $inputs): void;
    public function registerCommand(string $commandName, string $className): void;
}