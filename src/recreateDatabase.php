<?php

require_once('vendor/autoload.php');
require_once('pixieConnect.php');


$queries = [];
$queries[] = "DROP TABLE IF EXISTS `wio_struct_networks`";
$queries[] = "CREATE TABLE `wio_struct_networks` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(64) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = "DROP TABLE IF EXISTS `wio_struct_node_types`";
$queries[] = "CREATE TABLE `wio_struct_node_types` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `network_id` INT(11) NOT NULL ,
    `name` VARCHAR(64) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = "DROP TABLE IF EXISTS `wio_struct_nodes`";
$queries[] = "CREATE TABLE `wio_struct_nodes` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `node_type_id` INT(11) NOT NULL ,
    `name` VARCHAR(64) NOT NULL ,
    `lat` FLOAT( 10, 6 ) NOT NULL ,
    `lng` FLOAT( 10, 6 ) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = "DROP TABLE IF EXISTS `wio_struct_links`";
$queries[] = "CREATE TABLE `wio_struct_links` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `node_parent_id` INT(11) NOT NULL ,
    `node_children_id` INT(11) NOT NULL ,
    `auto_generated` INT(3) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = "DROP TABLE IF EXISTS `wio_struct_node_flags_types`";
$queries[] = "CREATE TABLE `wio_struct_node_flags_types` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(64) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = "DROP TABLE IF EXISTS `wio_struct_node_flags`";
$queries[] = "CREATE TABLE `wio_struct_node_flags` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `node_id` INT (11) NOT NULL ,
    `node_flag_type_id` INT(11) NOT NULL ,
    `flag_data` VARCHAR(255) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

$queries[] = 'INSERT INTO `wio_struct_networks`(name) VALUES ("administrative")';

foreach($queries as $query){
    $qb->query($query);
    var_dump($query);
}
