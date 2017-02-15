<?php 

namespace Emadadly\LaravelUuid;

class UUIDManager
{
    /**
     * @type string
     */
    private $uuid;

    public function __construct()
    {
        $uuid = $this->generate();

        $this->uuid = $uuid;

        return $uuid;
    }

/*    public function __toString()
    {
        return $this->uuid;
    }*/


    /**
     *
     * This function will return a UUID
     *
     * @return type string
     */
    public static function generate()
    {

            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"

            $uuid = str_replace('{', '' , $uuid);
            $uuid = str_replace('}', '' , $uuid);

            return $uuid;
    
    }
} 