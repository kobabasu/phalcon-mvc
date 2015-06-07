<?php
use Phalcon\Loader;

/* loadder settings */

$loader = new Loader();

$loader->registerDirs(array(
  $config->app->controllersDir,
  $config->app->modelsDir,
  $config->app->viewsDir
))->register();
