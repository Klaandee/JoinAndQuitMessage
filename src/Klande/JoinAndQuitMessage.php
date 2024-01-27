<?php

namespace Klande;

// PocketMine Features

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\SingletonTrait;
use pocketmine\event\Listener;

// Plugin Features

use Klande\events\EventListener;

class JoinAndQuitMessage extends PluginBase {
   
   use SingletonTrait;
   
   public function onLoad(): void {
      self::setInstance($this);
   }
   
   public function onEnable(): void {
      
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
      
      $this->saveResource('config.yml');
      
      $this->getLogger()->info('Join and Quit Message by Klande has enable');
   }
}