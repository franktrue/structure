<?php
namespace composite;

class LeafMenu extends Item
{
    public function tree()
    {
        $prefix = "";
        for($i=0;$i<$this->level;$i++){
            $prefix .= "--";
        }
        return $prefix . $this->name;
    }
}