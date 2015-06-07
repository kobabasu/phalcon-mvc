<?php

class IndexController extends \Phalcon\Mvc\Controller
{
  public function indexAction()
  {
    $this->view->namefield = 'firstname';
    $this->view->fruits = array('apple', 'banana');
    // $this->view->disable();
  }
}
