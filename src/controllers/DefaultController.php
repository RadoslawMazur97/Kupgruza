<?php
require_once 'AppController.php';
class DefaultController extends AppController {


    public function index () {

        $this->render('login');
 
     }

    public function advertisement (){
        $this->render('advertisements');
    }

    public function register (){
        $this->render('register');
    }
    public function addcar () {

        $this->render('addcar');
 
     }
     public function search () {

        $this->render('search');
 
     }
 
 

}