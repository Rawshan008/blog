<?php 

Class Formate{
    /**
     * Date fixed
     */

     public function formateDate($date){
         return date("F j, Y g:i a", strtotime($date));
     }

     /**
      * textshortner
      */

      public function textShortner($text, $limit = 400){
          $text = $text. " ";
          $text = substr($text, 0, $limit);
          $text = $text. " ...";
          return $text;
      }

      /**
       * Form Validation
       */
    
       public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
       }
}