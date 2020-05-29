<?php

namespace tuto;

use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;


class Main extends PluginBase implements Listener
{

private $config;
    public function onEnable()
    {
        $this->getLogger()->info("le plugin a été correctement lancer");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);

@mkdir($this->getDataFolder());

        if (!file_exists($this->getDataFolder() . "config.yml")) {

            $this->saveResource('config.yml');       

    }
    $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML, array(
   "block" => "BEETROOT_BLOCK",
   "loot" => "377"
));
}


    public function onBreak(BlockBreakEvent $event) {
        $block = $event->getBlock();
            $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);

               if($block->getID() == $config->get('block')) {

                    $event->setDrops($config->get('loot'));

                
        }
    }



    public function onDisable()
{
    $this->getLogger()->info("le plugin a été correctement desactiver");
}
}
