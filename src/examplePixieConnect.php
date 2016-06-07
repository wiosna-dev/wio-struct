<?php
#creating PIXIE for tests
$config = array(
            'driver'    => 'mysql',
            'host'      => 'superw.loc',
            'database'  => 'super_w',
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
