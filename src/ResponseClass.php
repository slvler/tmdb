<?php

/*
 * requestlerden dönen verilerin çözülmesi
 *
 */

class ResponseClass
{

  __public function __construct(?array $Response = [])
    {



        if ($Response) {

            $this->setMessage($response['message']);
          
        }
    }

}
