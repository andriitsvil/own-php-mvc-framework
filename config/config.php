<?php

Config::set('site', 'mvc_pa');
Config::set('languages', array('en','ru'));
Config::set('charset', 'utf-8');
Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_'
));
Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');


Config::set('db.host', '127.0.0.1');
Config::set('db.user', 'newuser');
Config::set('db.password', 'password');
Config::set('db.db_name', 'mvc');

Config::set('salt', '458f5jdn7dbf675jdn');

/**
 *
 * insert into users
set login = 'admin',
email = 'admin@mail.com',
role = 'admin',
`password` = md5('458f5jdn7dbf675jdnadmin');
 */