<?php
use Phalcon\Debug,
    Phalcon\Mvc\Application,
    Phalcon\Exception;

/* debug settings */

error_reporting(E_ALL);

$debug = new Debug();
$debug->listen();

/* include config files */

$config = require __DIR__ . '/../app/config/config.php';
$config->merge(require __DIR__ . '/../app/config/database.php');
require __DIR__ . '/../app/config/loader.php';
require __DIR__ . '/../app/config/services.php';

/* app */

try {
  $app = new Application($di);
  echo $app->handle()->getContent();
} catch(Exception $e) {
  echo "Phalcon: " . $e->getMessage();
} catch(PDOException $e) {
  echo "PDO: " . $e->getMessage();
}
