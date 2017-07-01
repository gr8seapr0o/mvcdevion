<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 30.06.2017
 * Time: 8:56
 */
class ContactsController extends Controller{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Message();
    }


    public function index(){
             if ( $_POST ){
                 if ( $this->model->save($_POST) ){
                     Session::setFlash("Thank you! Your message was sen successfully");
                 }
             }
    }

     public function admin_index() {
         $this->data = $this->model->getList();
     }
}