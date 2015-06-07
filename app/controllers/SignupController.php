<?php

class SignupController extends \Phalcon\Mvc\Controller
{
  public function indexAction() {
    // $this->view->disable();
  }

  public function registerAction() {
    $user = new Users();

    $success = $user->save(
      $this->request->getPost(),
      array(
        'name',
        'email'
      )
    );

    if($success) {
      echo "Thank You!";
    } else {
      echo "Sorry, problems were generated: <br>";
      foreach ($user->getMessages() as $message) {
        echo $message->getMessage(), "<br>";
      }
    }

    $this->view->disable();
  }
}
