<?php

if (file_exists(dirname(__FILE__) . '/mainconf.php')) {
    require dirname(__FILE__) . '/mainconf.php';
}
define('APPLICATION_PATH', dirname(__FILE__));
defined('ENVIRONMENT')
    or define('ENVIRONMENT', 'production');

$includePath = array(
    dirname(__FILE__) . '/../library',
    get_include_path(),
);
set_include_path(implode(PATH_SEPARATOR, $includePath));

require_once 'Zend/Loader.php';
Zend_Loader::registerAutoload();

$dsConfig = new Zend_Config_Ini(APPLICATION_PATH . '/conf/db.ini', ENVIRONMENT);
$db = Zend_Db::factory($dsConfig->db);
Zend_Db_Table_Abstract::setDefaultAdapter($db);
Zend_Registry::set('db', $db);
