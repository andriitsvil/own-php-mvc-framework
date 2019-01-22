<?php
 class PagesController extends Controller {
   /**
    * PagesController constructor.
    * @param array $data
    */
   public function __construct(array $data = array())
   {
     parent::__construct($data);
     $this->model = new Page ;
   }


   public function index(){
         $this->data['pages'] = $this->model->getList();
     }


     public function view(){
         $params = App::getRouter()->getParams();
         if($params[0]){
             $alias = strtolower($params[0]);
         }
         $this->data['page'] = $this->model->getByAlias($alias);
     }
 }