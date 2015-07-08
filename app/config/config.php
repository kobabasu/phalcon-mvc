<?php
use Phalcon\Config;

return new Config(array(
  'baseurl' => '/mvc/public/',

  'app' => array(
    'controllersDir' => '../app/controllers/',
    'modelsDir'      => '../app/models/',
    'viewsDir'       => '../app/views/'
  ),

  'volt' => array(
    'voltExt'        => '.volt',
    'compiledPath'   => '../.compiled/',
    'compiledExt'    => '.compiled'
  )
));
