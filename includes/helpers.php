<?php
    /**
     * Created by PhpStorm.
     * User: gabykaram
     * Date: 8/3/21
     * Time: 12:17 AM
     * File: helpers.php
     */
    if(!function_exists('accessProtected')) {
    
        function accessProtected( $obj, $prop ) {
            $reflection = new ReflectionClass( $obj );
            $property   = $reflection->getProperty( $prop );
            $property->setAccessible( true );
        
            return $property->getValue( $obj );
        }
    }
