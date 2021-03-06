<?php

class HomeController extends Controller
{

  public function __construct($_controller, $_action)
  {
    parent::__construct($_controller, $_action);
  }

  public function indexAction()
  {
    if (currentUser()) {
      if (currentUser()->userType() == "LogedIn-Student") {
        $this->view->render("home/student");
      } else if (currentUser()->userType() == "LogedIn-Company") {
        $this->view->render("home/company");
      }else if (currentUser()->userType() == "LogedIn-Admin") {
        $this->view->render("home/admin");
      }

    }else{
      $this->view->render("register/login");
    }
  }
}
