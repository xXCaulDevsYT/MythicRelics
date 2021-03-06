<?php

namespace MythicRelics\relics;

use MythicRelics\EventLoader;

use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\utils\Random;

class Ancient implements Listener
{
    private $plugin;

    public function __construct(Loader $plugin)
    {
        $this->setPlugin($plugin);
        $plugin->getServer()->getPluginManager()->registerEvents($this, $plugin);
    }

    public function setPlugin($plugin)
    {
        return $this->plugin;
    }

    public function onBlockBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();
        $name = $player->getName();
        $block = $event->getBlock();
        $chance = mt_rand(0,780);

        if($block->getId() === 1){
            if($chance === 1){

                $relic = Item::get(54, 101, 1);
                $relic->setCustomName(TF::RESET . TF::AQUA . "Ancient" . TF::GRAY . " relic");
                $relic->setLore(TF::RESET . TF::LIGHT_PURPLE . "Level:" . TF::GRAY . "§l§7[§r§b||||||§f||||§l§7]§r");
                $relic->setLore(TF::RESET . TF::LIGHT_PURPLE . "Source:" . TF::GRAY . "§6Kits , Crates , Vouchers§7!");
                $relic->setLore(TF::RESET . TF::LIGHT_PURPLE . "To Open:" . TF::GRAY . "§3(§7Right-Click§3)");
                $player->getInventory()->addItem($relic);
                $player->getServer()->broadcastMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::DARK_PURPLE . "!" . TF::DARK_GRAY . ")" . TF::RESET . TF::GRAY . TF::RESET . TF::GRAY . " $name Found an Ancient Relic!");
            }
        }
    }

    public function onTap(BlockPlaceEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();

        $damage = $event->getItem()->getDamage();

        $prot = Enchantment::getEnchantment(0);
        $unb = Enchantment::getEnchantment(17);
        $sharp = Enchantment::getEnchantment(9);
        $eff = Enchantment::getEnchantment(15);
        $kb = Enchantment::getEnchantment(12);
        $loot = Enchantment::getEnchantment(14);
        $fire = Enchantment::getEnchantment(13);
        $resp = Enchantment::getEnchantment(6);

        switch($damage) {
            case "101":
            $relic = Item::get(54, 101, 1);
            $item1 = Item::get(310, 0, 1);
            $item1->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Helmet");
            $item1->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $item1->addEnchantment(new EnchantmentInstance($prot, 1));
            $item1->addEnchantment(new EnchantmentInstance($unb, 1));

            $item2 = Item::get(311, 0, 1);
            $item2->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Chestplate");
            $item2->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $item2->addEnchantment(new EnchantmentInstance($prot, 1));
            $item2->addEnchantment(new EnchantmentInstance($unb, 1));
            
            $item3 = Item::get(312, 0, 1);
            $item3->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Leggings");
            $item3->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $item3->addEnchantment(new EnchantmentInstance($prot, 1));
            $item3->addEnchantment(new EnchantmentInstance($unb, 1));

            $item4 = Item::get(313, 0, 1);
            $item4->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Boots");
            $item4->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $item4->addEnchantment(new EnchantmentInstance($prot, 1));
            $item4->addEnchantment(new EnchantmentInstance($unb, 1));

            $sword = Item::get(276, 0, 1);
            $sword->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Sword");
            $sword->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $sword->addEnchantment(new EnchantmentInstance($sharp, 1));
            $sword->addEnchantment(new EnchantmentInstance($unb, 1));

            $pickaxe = Item::get(278, 0, 1);
            $pickaxe->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Pickaxe");
            $pickaxe->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $pickaxe->addEnchantment(new EnchantmentInstance($eff, 1));
            $pickaxe->addEnchantment(new EnchantmentInstance($unb, 1));

            $axe = Item::get(279, 0, 1);
            $axe->setCustomName(TF::AQUA . "Ancient" . TF::GRAY . "Axe");
            $axe->setLore(TF::AQUA . "Level:" . TF::GRAY . "§l§7[§r§b|||§f|||||||§l§7]§r");
            $axe->addEnchantment(new EnchantmentInstance($eff, 1));
            $axe->addEnchantment(new EnchantmentInstance($unb, 1));

            $diamond = Item::get(264, 0, 4);
            $iron = Item::get(265, 0, 16);
            $gold = Item::get(266, 0, 8);

            $tobegiven1 = [$item1, $item2, $item3, $item4, $sword, $pickaxe, $axe]; //array1
            $rand1 = mt_rand(0, 1);

            $player->getInventory()->addItem($tobegiven1[$rand1]);
            $player->sendMessage(TF::LIGHT_PURPLE . "====================");
            $player->sendMessage(TF::GREEN . "Opening Relic...");
            $player->sendMessage(TF::LIGHT_PURPLE . "====================");
            
            $player->getInventory()->removeItem($relic);
            break;
        }
    }
}
