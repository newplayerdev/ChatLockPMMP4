# ChatLockPMMP4
A PocketMine-MP 4.0 plugin that allows you to lock and unlock the chat

Usage: /chatlock [on|off]

Permissions: - chatlock.use
             - chatlock.bypass
            
**Config** 

`config.yml` file:

```yml
---

# Command description
command-description: "Allow you to lock or unlock the chat"

# Permission message
permission-message: "§cYou don't have the permission to use that command !"

# Messages sent to player when chat locked
chatlock-on: "You locked the chat"
chatlock-off: "You unlocked the chat"
chatlock-already-on: "Chat is already locked"
chatlock-already-off: "Chat is already unlocked"

# Broadcast message when chat locked/unlocked
# {player} => name of player who locked/unlocked the chat
broadcast-message-locked: "§c{player} §flocked the chat !"
broadcast-message-unlocked: "§c{player} §f unlocked the chat !"

# Messages sent to player when try to talk in chat
chat-is-locked: "§cThe chat is currently locked"

...

```
