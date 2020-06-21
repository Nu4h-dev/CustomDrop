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
            "loot-count" => "60",
            "block" => "BEETROOT_BLOCK",
            "data" => "7",
            "loot-data" => "7",
        ));
    }

    public function onBreak(BlockBreakEvent $event)
    {
        $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
       foreach ($config->getAll() as $drop) {
            if ($event->getBlock()->getId() == $drop['block'] && $event->getBlock()->getDamage() == $drop['data']) {
                $event->setDrops([Item::get($drop['loot-id'],$drop['loot-data'], $drop['loot-count'])]);
            }
       }
    }
}
