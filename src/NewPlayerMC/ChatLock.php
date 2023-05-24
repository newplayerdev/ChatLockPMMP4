<?php

namespace NewPlayerMC;

use NewPlayerMC\commands\ChatLockCommand;
use NewPlayerMC\listener\ChatListener;
use pocketmine\event\Listener;

class ChatLock extends \pocketmine\plugin\PluginBase implements Listener
{
    private static ChatLock $instance;

    protected function onEnable(): void
    {
        self::$instance = $this;
        $this->saveResource("config.yml");
        $this->saveDefaultConfig();
        $this->getServer()->getCommandMap()->register("chatlock", new ChatLockCommand());
        $this->getServer()->getPluginManager()->registerEvents(new ChatListener(), $this);
    }

    public static function getInstance(): ChatLock {
        return self::$instance;
    }

}