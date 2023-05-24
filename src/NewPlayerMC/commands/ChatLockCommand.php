<?php

namespace NewPlayerMC\commands;

use NewPlayerMC\ChatLock;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class ChatLockCommand extends \pocketmine\command\defaults\PluginsCommand
{
    public static bool $chatLock = false;

    public function __construct()
    {
        parent::__construct("chatlock");
        $this->setUsage("chatlock [on|off]");
        $this->setDescription(ChatLock::getInstance()->getConfig()->get("command-description"));
        $this->setPermission("chatlock.use");
        $this->setPermissionMessage(ChatLock::getInstance()->getConfig()->get("permission-message"));
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player and !$this->testPermission($sender)) return $sender->sendMessage(ChatLock::getInstance()->getConfig()->get("permission-message"));
        if (!count($args) == 1) return $sender->sendMessage(TextFormat::RED . "/" . $this->getUsage());
        switch ($args[0]) {
            case "on":
                if (self::$chatLock === true) return $sender->sendMessage(ChatLock::getInstance()->getConfig()->get("chatlock-already-on"));
                self::$chatLock = true;
                $sender->sendMessage(ChatLock::getInstance()->getConfig()->get("chatlock-on"));
                Server::getInstance()->broadcastMessage(str_replace("{player}", $sender->getName(), ChatLock::getInstance()->getConfig()->get("broadcast-message-locked")));
                break;
            case "off":
                if (self::$chatLock === false) return $sender->sendMessage(ChatLock::getInstance()->getConfig()->get("chatlock-already-off"));
                self::$chatLock = false;
                $sender->sendMessage(ChatLock::getInstance()->getConfig()->get("chatlock-off"));
                Server::getInstance()->broadcastMessage(str_replace("{player}", $sender->getName(), ChatLock::getInstance()->getConfig()->get("broadcast-message-unlocked")));
                break;
        }
    }

}