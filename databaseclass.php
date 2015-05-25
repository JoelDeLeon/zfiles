<?php
        class Database
        {
            // Store the single instance of Database
            private static $m_pInstance;

            private $db='';
            private $infocollection = '';
            private $artifex = '';

            // Private constructor to limit object instantiation to within the class
            private function __construct() 
            {
                $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
                 $db = $m->jdpersonal;
                 $infocollection = $db->log;
                 $artifex = $db->artifex;
            }

            // Getter method for creating/returning the single instance of this class
            public static function getInstance()
            {
                if (!self::$m_pInstance)
                {
                    self::$m_pInstance = new Database();
                }
                return self::$m_pInstance;
            }

            public function infoquery($query)
            {
               return $infocollection->findOne($query);
            }
            public function artquery($query)
            {
               return $artifex->findOne($query);
            }

         }
?>