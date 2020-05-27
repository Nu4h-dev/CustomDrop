<?php

namespace tuto;

use pocketmine\block\block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;


class Main extends PluginBase implements Listener
{


    public function onEnable()
    {
        $this->getLogger()->info("le plugin a été correctement lancer");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);

       

    }


    public function onBreak(BlockBreakEvent $event) {
        $block = $event->getBlock();
        if($block->getID() === Block::BEETROOT_BLOCK && mt_rand(1, 60) <= 1) {
            $event->setDrops([Item::get(377, 0, 1)]);
        }
    }



    public function onDisable()
{
    $this->getLogger()->info("le plugin a été correctement desactiver");
}
}
