<?php
    class Customer extends DataBoundObject{
        protected $CustomerID;
        protected $StoreID;
        protected $FirstName;
        protected $LastName;
        protected $Email;
        protected $AddressID;
        protected $ActiveBool;
        protected $CreateDate;
        protected $LastUpdate;
        protected $Active;

        protected function DefineTableName(){
            return("customer");
        }
        protected function DefineRelationMap() {
            return(array(
                    "id" => "CustomerID",
                    "store_id" => "StoreID",
                    "first_name" => "FirstName",
                    "last_name" => "LastName",
                    "email" => "Email",
                    "address_id" => "AddressID",
                    "activebool" => "ActiveBool",
                    "create_date" => "CreateDate",
                    "last_update" => "LastUpdate",
                    "active" => "Active"));
        }
    }
?>
