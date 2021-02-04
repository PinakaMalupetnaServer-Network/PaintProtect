<?php

use pocketmine\entity\object\Painting;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;


class main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getpluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("PaintProtect has been enabled");
        $this->getLogger()->info("created by princepines, code by codeeeh, exclusively for PMnS.");

    }

    public function onDisable()
    {
        $this->getLogger()->warning("disabling PaintProtect");
    }

    public function onDamage(EntityDamageByEntityEvent $e, Player $player): void
    {
        $level = $this->getServer()->getLevelByName("lobby");
        if (!$player->getEffectivePermissions() == "pp.bypass") {
            if ($player->getLevel() === $level) {
                if ($e->getEntity() instanceof Painting) {
                    $e->setCancelled();
                }
            }
        }
    }
}