<?php

namespace App\Http\Traits;

use Validator;

trait CodeGenerator
{
	/**
     * Creates a single code using random characters
     * 
     * @return string
     * @access protected
     */
    protected function generate_code($purpose)
    {
    	
    	switch($purpose)
        {
            case 'user_id':

            $code_length = 4;
            $generated_code = $this->create($code_length);
            
            $validator = Validator::make([
                'id' => $generated_code,
                'id' => 'unique:users,id',
            ]);

            if($validator->fails())
            {
                $this->generate_code('user_id');
            }
            return $generated_code;
            break;

            case 'promo_code':

            $code_length = 8;
            $generated_code = $this->create($code_length);
            
            $validator = Validator::make([
                'promo_code' => $generated_code],[
                'promo_code' => 'unique:users,promo_code',
            ]);

            if($validator->fails())
            {
                $this->generate_code('promo_code');
            }
            return $generated_code;
            break;

            case 'invitation_code':

            $code_length = 6;
            $generated_code = $this->create($code_length);
            
            $validator = Validator::make([
                'invite_code' => $generated_code],[
                'invite_code' => 'unique:users,invite_code',
            ]);

            if($validator->fails())
            {
                $this->generate_code('invitation_code');
            }
            return $generated_code;
            break;

            case 'reference_number':

            $code_length = 10;
            $generated_code = $this->create($code_length);
            
            $validator = Validator::make([
                'reference_number' => $generated_code],[
                'reference_number' => 'unique:records,reference_number',
            ]);

            if($validator->fails())
            {
                $this->generate_code('reference_number');
            }
            return $generated_code;
            break;

            default:
            $code_length = 0;
            $generated_code = $this->create($code_length);
            
            
            return $generated_code;
        }
        
    	
    }

    protected function create($code_length)
    {
        $chars = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
        $generated_code = '';
        for($i=0 ; $i<$code_length ; $i++)
        {
            $generated_code .= $chars[rand(0,count($chars)-1)];
        }
        return $generated_code;
    }

    
}



?>


