<?php 
namespace WabLab\Module\Standard;

interface Entity 
{
    public function getId() : mixed;
    public function setId(mixed $id) : void;
}