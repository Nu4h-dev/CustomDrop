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
public function onEnable(){
@mkdir($this->getDataFoler());
if(!file_exists($this->getDataFolder()){
$this->saveResource('config.yml');
}
$config = new Config($this->getDataFolder() . 'config.yml', Config::YAML, array(
"loot" => "377",
"block" => "BEETROOT_BLOCK",
));
}
public function onBreak(BlockBreakEvent $ev){
$config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);
if($ev->getBlock()->getId() == $config->get('block')){
$event->setDrops([Item::get($config->get('loot'), 0, 1]);
}
}
}
