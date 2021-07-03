<?php
namespace composite;

class BranchMenu extends Item
{
    private $subs = [];

    public function tree()
    {
        $prefix = "";
        for($i=0;$i<$this->level;$i++){
            $prefix .= "--";
        }
        $str = $prefix . $this->name . "\n";
        foreach($this->subs as $sub) {
            $str .= $sub->tree()."\n";
        }
        return $str;
    }

    public function addItem(Item $item)
    {
        if(!in_array($item, $this->subs, true)) {
            $this->subs[] = $item;
        }
    }

    public function removeItem(Item $item)
    {
        $this->subs = array_udiff($this->subs, [$item], function($a, $b){
            return ($a === $b)?0:1;
        });
    }
}
