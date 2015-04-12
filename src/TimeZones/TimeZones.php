<?php

namespace TimeZones;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;


class TimeZones extends PluginBase implements Listener {
    # a commision plugin, view here: https://forums.pocketmine.net/threads/time-zones.7624/
    public function onEnable(){
        
    #to load a custom file folder
	
    if(!is_dir($this->getDataFolder())) {
      mkdir($this->getDataFolder());
    }
    #makes the config (important)
    if(!file_exists($this->getDataFolder() . "config.yml")) {
      $this->getLogger()->info("Config.yml file detected!");
    }
      
      
      
        $this->getLogger()->info("TimeZones plugin enabled!");
        
        $this->getLogger()->info("Current time + date is:");
        
        $commanderPackage = $this->getConfig()->get("corrector");
        $correctHour = date('h');
        $dater = $correctHour + $commanderPackage;
        $timers = date('i:s');
        $this->getLogger()->info($dater . ":" . $timers);
    }  
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "tz"){
        
        $commanderPackage = $this->getConfig()->get("corrector");
        $correctHour = date('h');
        $dater = $correctHour + $commanderPackage;
        $timers = date('i:s');
        $sender->sendMessage($dater . ":" . $timers);
        return true;
        
    }
    elseif(strtolower($command->getName()) === "tsetup"){
        
        $this->getLogger()->info("Making defrault config file content...");
        $seeClasses = "corrector: 0";
        file_put_contents($this->getDataFolder() . "config.yml", $seeClasses);
        $this->getLogger()->info("Command Successful!");
        }
    
    
    
    

    return false;
}
    }

