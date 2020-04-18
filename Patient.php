<?php


class Patient
{
    public $name;
    public $value;
    public $next;

    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->value = $data;
        $this->next = null;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->name;
    }
}