<?php


#creating PIXIE for tests
$config = array(
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'wio_struct',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'options'   => array(
                \PDO::ATTR_TIMEOUT => 5,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ),
        );

$connection = new \Pixie\Connection('mysql', $config);
$qb = new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
