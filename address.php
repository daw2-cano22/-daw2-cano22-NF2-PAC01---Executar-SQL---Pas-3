<?php
    class Address extends DataBoundObject{
        protected $AddressID;
        protected $Address;
        protected $Address2;
        protected $District;
        protected $CityID;
        protected $PostalCode;
        protected $Phone;
        protected $LastUpdate;
        

        protected function DefineTableName(){
            return("address");
        }
        protected function DefineRelationMap() {
            return(array(
                    "id" => "AddressID",
                    "address" => "Address",
                    "address2" => "Address2",
                    "district" => "District",
                    "city_id" => "CityID",
                    "postal_code" => "PostalCode",
                    "phone" => "Phone",
                    "last_update" => "LastUpdate"));
        }
    }
?>