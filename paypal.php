<?php


class  Paypal{
    
    private $user = 'mountakhadjigo-facilitator-2@gmail.com';
    private $pwd = 'PZN7T5RGV5GLZUBP';    
    private $signature = 'ALFgi8ofeA-6HuFl5AL7sH8tfO1oAu8lofcrLZkuY0Uhj9fbWcx1NKiE';
    public $endpoint = 'https://api-3T.sandbox.paypal.com/nvp' ;
    public $errors = array();
    
    
    
   public function _construct($user = false , $pwd =false , $signature = false , $prod = false)
   {
       
       
       
       if($user){
           
           $user = $this->user ;
           
       }
       
        if($pwd){
           
           $pwd = $this->pwd ;
           
       }                                                                                                                    
       
        if($signature){
           
           $signature = $this->signature ;
           
       }
       
       
        if($prod){
           
        $this->endpoint = str_replace('sandbox', '' , $this->endpoint) ;
           
       }
        }
       
       public function request($method, $params){
          $params =array_merge($params, array(
           'METHOD' => $method,
           'USER' => $this->user,
           'PWD' => $this->pwd,
           'SIGNATURE' => $this->signature
           ));
           
           $params = http_build_query($params);
           
           $curl = curl_init();
           curl_setopt_array($curl, array(
           CURLOPT_URL => $this->endpoint,
              CURLOPT_POST => 1,
               CURLOPT_POSTFIELDS => $params,
               CURLOPT_RETURNTRANSFER => 1,
               CURLOPT_SSL_VERIFYPEER => 0 ,
               CURLOPT_SSL_VERIFYHOST => 0 ,
               CURLOPT_VERBOSE => 1 
               
           ));
           
           $reponse = curl_exec($curl);
           parse_str($reponse, $reponseArray);
           
           if(curl_errno($curl)){
               
               $this->errors = curl_error($curl);
               curl_close($curl);
               
               return false;
               
           }else{
                    $this->errors = curl_error($curl);
               curl_close($curl);
              
               return false;
               }
           }
           
           
       }
       
       
       
   



?>
