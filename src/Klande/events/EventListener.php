<?php

namespace Klande\events;

// PocketMine Features

use pocketmine\utils\TextFormat;
use pocketmine\player\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\Server;

// Plugin Features

use Klande\JoinAndQuitMessage;

class EventListener implements Listener {
   
   private $player = [];
   private $plugin;
   
   public function onJoin(PlayerJoinEvent $event)
   {
      $player = $event->getPlayer();
      $name = $player->getName();
      
      $event->setJoinMessage("");
      $this->plugin = JoinAndQuitMessage::getInstance();
      Server::getInstance()->broadcastMessage(str_replace(["{player}"], [$player->getName()], $this->plugin->getConfig()->getNested('JoinAndQuit')['Join']));
   }
   
   public function onQuit(PlayerQuitEvent $event)
   {
      $player = $event->getPlayer();
      $name = $player->getName();
      
      $event->setQuitMessage("");
      $this->plugin = JoinAndQuitMessage::getInstance();
      Server::getInstance()->broadcastMessage(str_replace(["{player}"], [$player->getName()], $this->plugin->getConfig()->getNested('JoinAndQuit')['Quit']));
   }
}