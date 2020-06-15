<?php

namespace nu4h;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class main extends PluginBase implements Listener
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
        ));
    }

    public function onBreak(BlockBreakEvent $event)
    {
        $config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
        if ($event->getBlock()->getId() == $config->get('block')) {
            $event->setDrops([Item::get($config->get('loot'), 0, 1)]);
        }
    }
}
