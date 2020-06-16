<?php

namespace nu4h;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase 
{
    public function onEnable()
    {
        @mkdir($this->getDataFolder());
        if (!file_exists($this->getDataFolder())) {
            $this->saveResource("config.yml");
        }
        $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML, array(
            "loot" => "377",
            "block" => "BEETROOT_BLOCK",
            "data" => "7",
        ));
    }

    public function onBreak(BlockBreakEvent $event)
    {
        $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
        if ($event->getBlock()->getId() == $config->get('block')) && $event->getBlock()->getDamage() == $config->get('data') {
            $event->setDrops([Item::get($config->get('loot'), 0, 1)]);
        }
    }
}
