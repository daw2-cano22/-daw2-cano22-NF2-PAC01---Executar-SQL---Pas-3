<?php
    require("class.pdofactory.php");
    require("abstract.databoundobject.php");
    require("address.php");

    print "Running...<br />";

    $strDSN = "pgsql:dbname=dvdrental;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
        array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $objAddress = new Address($objPDO);
    //$objAddress2 = new Address($objPDO);

    $objAddress->setAddress("Viale Castro Pretorio");
    $objAddress->setAddress2("Via Livio Pentimalli");
    $objAddress->setDistrict("Municipio Roma XIII");
    $objAddress->setCityID("1");
    $objAddress->setPostalCode("12345");
    $objAddress->setPhone("98678890");
    $objAddress->setLastUpdated("18/02/2022");

    print "Address is " . $objAddress->getAddress() . "<br />";
    print "Address 2 is " . $objAddress->getAddress2() . "<br />";
    print "District is " . $objAddress->getDistrict() . "<br />";
    print "City ID is " . $objAddress->getCityID() . "<br />";
    print "Postal Code is " . $objAddress->getPostalCode() . "<br />";
    print "Phone is " . $objAddress->getPhone() . "<br />";
    print "Last Update is " . $objAddress->getLastUpdated() . "<br />";

    $objAddress->setAddress("Avinguda Moli de la Torre")->setAddress2("Rambla Solidaritat")->setDistrict("Municipio 3 Badalona")->setCityID("3")->setPostalCode("54321")->setPhone("98780090")->Save();
    print "Address is " . $objAddress->getAddress() . "<br />";
    print "Address 2 is " . $objAddress->getAddress2() . "<br />";
    print "District is " . $objAddress->getDistrict() . "<br />";
    print "City ID is " . $objAddress->getCityID() . "<br />";
    print "Postal Code is " . $objAddress->getPostalCode() . "<br />";
    print "Phone is " . $objAddress->getPhone() . "<br />";
    print "Last Update is " . $objAddress->getLastUpdated() . "<br />";
    //->setDistrict("Municipio Roma XIII")->setCityID("1")->setPostalCode("12345")->setPhone("98678890")->setLastUpdated("18/02/2022")->Save();
    print "Saving...<br />";

    //$objAddress->Save();

    echo  "<br>";

    $id = $objAddress->getID();
    print "ID in database is " . $id . "<br />";

    print "Destroying object...<br />";
    unset($objAddress);

    print "Recreating object from ID $id<br />";
    $objAddress = new Address($objPDO);
    $objAddress2 = new Address($objPDO);

    //$objAddress2->setAddress("Viale Castro Pretorio")->setAddress2("Via Livio Pentimalli")->setDistrict("Municipio Roma XIII")->setCityID("1")->setPostalCode("12345")->setPhone("98678890")->setLastUpdated("18/02/2022")->Save();

    $objAddress->setAddress("Viale Castro Pretorio");
    $objAddress->setAddress2("Via Livio Pentimalli");
    $objAddress->setDistrict("Municipio Roma XIII");
    $objAddress->setCityID("1");
    $objAddress->setPostalCode("12345");
    $objAddress->setPhone("98678890");
    $objAddress->setLastUpdated("19:50");

    print "Address is " . $objAddress->getAddress() . "<br />";
    print "Address 2 is " . $objAddress->getAddress2() . "<br />";
    print "District is " . $objAddress->getDistrict() . "<br />";
    print "City ID is " . $objAddress->getCityID() . "<br />";
    print "Postal Code is " . $objAddress->getPostalCode() . "<br />";
    print "Phone is " . $objAddress->getPhone() . "<br />";
    print "Last Update is " . $objAddress->getLastUpdated() . "<br />";

    print "Committing a change.... Steve will become Steven, 
    Nowicki will become Nowickcow<br/>";
    $objAddress->setAddress("Viale Castro Pretorio");
    $objAddress->setAddress2("Via Livio Pentimalli");
    print "Saving...<br />";
    //$objAddress->Save();
?>