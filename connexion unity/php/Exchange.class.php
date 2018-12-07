<?php
   class Exchange
   {
       public $Actions = array();
       
       
       
        public function Add($action)
       {
           $this->Actions[]=$action;
       }
   }
