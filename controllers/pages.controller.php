<?php
 class PagesController extends Controller {

     public function index(){
         $this->data['test_content'] = 'Here will be pages controller';
     }
     public function view(){
         $params = App::getRouter()->getParams();
         if($params[0]){
             $alias = strtolower($params[0]);
         }
         $this->data['content'] = "here will be a page with {$alias} alias";
     }
 }