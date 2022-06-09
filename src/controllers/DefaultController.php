<?php
require_once 'AppController.php';
class DefaultController extends AppController {

    public function login () {

       $this->render('login');

    }
    public function index () {

        $this->render('login');
 
     }
 

    public function advertisement (){
        $this->render('advertisement');
    }
    public function register (){
        $this->render('register');
    }
    public function addcar () {

        $this->render('addcar');
 
     }
     public function homepage () {

        $this->render('homepage');
 
     }
 
 

}