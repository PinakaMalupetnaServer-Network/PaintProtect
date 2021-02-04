<?php

namespace paintprotect\pp;

use pocketmine\entity\object\Painting;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;



class paintprotect extends PluginBase implements Listener
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

    public function onDamage(EntityDamageByEntityEvent $e)
{
  $ent = $e->getEntity();

  if($ent->getLevel()->getName() == "lobby"){ 
  if($ent instanceof Painting)
  {
    $e->setCancelled();
  }
}
else{
  return;
}

}
}
