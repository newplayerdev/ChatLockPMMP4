<?php

namespace NewPlayerMC\listener;

use NewPlayerMC\ChatLock;
use NewPlayerMC\commands\ChatLockCommand;
use pocketmine\event\player\PlayerChatEvent;

class ChatListener implements \pocketmine\event\Listener
{
    public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        if (!$player->hasPermission("chatlock.bypass") and ChatLockCommand::$chatLock === true) {
            $player->sendMessage(ChatLock::getInstance()->getConfig()->get("chat-is-locked"));
            $event->cancel();
        }
    }

}