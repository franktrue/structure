<?php
namespace prototype;

class MacButton implements ButtonInterface
{
    private $navigability;

    public function __construct($navigability = "")
    {
        $this->navigability = $navigability;
    }
    public function shape()
    {
        echo "Mac:cricle{$this->navigability} \n";
    }
}
