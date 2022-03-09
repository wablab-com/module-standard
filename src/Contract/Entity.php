<?php 
namespace WabLab\Module\Standard\Contract;

interface Entity 
{
    public function getId() : mixed;
    public function setId(mixed $id) : void;
}