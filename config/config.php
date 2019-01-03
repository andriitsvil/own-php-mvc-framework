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
