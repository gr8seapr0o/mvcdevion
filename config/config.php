<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 23.06.2017
 * Time: 15:21
 */
Config::set('site_name', 'Your Site Name');

Config::set('language', array('en', 'fr'));

//Routes.Route name => method prefix

Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');


Config::set('db_host', 'pr0o.mysql.ukraine.com.ua');
Config::set('db_user', 'pr0o_mvc');
Config::set('db_password', 'plg5m8b9');
Config::set('db_name', 'pr0o_mvc');

//salt

Config::set('salt', 'h3h5hhk4l2l3j5n51n');

