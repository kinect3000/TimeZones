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
    }else{//if file don't exist, this create it and put "corrector" value
      $this->config = new Config( $this->getDataFolder() . "config.yml", Config::YAML);
      $this->getLogger()->info("Creating files...");
      $this->config->set("corrector:", 0);
      $this->config->set("meridiem:", "AM");
      $this->config->save();
      $this->getLogger()->info("Files created!");
    }
      
      
        $this->getLogger()->info("TimeZones plugin enabled!");
        
        $this->getLogger()->info("Current time is:");
        
        $commanderPackage = $this->getConfig()->get("corrector");
        $merid = $this->getConfig()->get("meridiem");
        
        if ($merid === "AM"){
           $mmrd = "AM";
        }
        $correctHour = date('h');
        $dater = $correctHour + $commanderPackage;
        $timers = date('i:s');
        $this->getLogger()->info($dater . ":" . $timers . $mmrd);
    }  
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "tz"){
        
        $commanderPackage = $this->getConfig()->get("corrector");
        $correctHour = date('h');
        $dater = $correctHour + $commanderPackage;
        $timers = date('i:s');
        $sender->sendMessage($dater . ":" . $timers . $mmrd);
        return true;
        
    }
}
    }

