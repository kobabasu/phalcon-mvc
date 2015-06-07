<?php
use Phalcon\DI\FactoryDefault,
    Phalcon\Mvc\Url,
    Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt,
    Phalcon\Db\Adapter\Pdo\Mysql;

$di = new FactoryDefault();

/* url settings */

$di->set('url', function() use ($config) {
  $url = new Url();
  $url->setBaseUri($config->baseurl);
  return $url;
});

/* view settings */

$di->set('voltService', function($view, $di) use ($config) {
  $volt = new Volt($view, $di);
  $volt->setOptions(array(
    'compiledPath' => $config->volt->compiledPath,
    'compiledExtension' => $config->volt->compiledExt
  ));
  return $volt;
});

$di->set('view', function() use ($config) {
  $view = new View();
  $view->setViewsDir($config->app->viewsDir);
  $view->registerEngines(array(
    $config->volt->voltExt => 'voltService'
  ));
  return $view;
});

/* database settings */

$di->set('db', function() use ($config) {
  return new Mysql(array(
    'host'     => $config->db->host,
    'dbname'   => $config->db->dbname,
    'username' => $config->db->username,
    'password' => $config->db->password
  ));
});
