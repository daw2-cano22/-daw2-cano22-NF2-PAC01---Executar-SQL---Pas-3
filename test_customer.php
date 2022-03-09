<?php
    require("class.pdofactory.php");
    require("abstract.databoundobject.php");
    require("customer.php");
    print "Running...<br />";

    $strDSN = "pgsql:dbname=dvdrental;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
        array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $objCustomer = new Customer($objPDO);

    $objCustomer->setStoreID(4);
    $objCustomer->setFirstName("Steve");
    $objCustomer->setLastName("Nowicki");
    $objCustomer->setEmail("stevenowicki@gmail.com");
    $objCustomer->setAddressID(-45);
    $objCustomer->setActiveBool(1);
    $objCustomer->setCreateDate(date("Y-m-d"));
    $objCustomer->setLastUpdated("19:50");
    $objCustomer->setActive("5");

    print "Store ID is " . $objCustomer->getStoreID() . "<br />";
    print "First name is " . $objCustomer->getFirstName() . "<br />";
    print "Last name is " . $objCustomer->getLastName() . "<br />";
    print "Email is " . $objCustomer->getEmail() . "<br />";
    print "Address is " . $objCustomer->getAddressID() . "<br />";
    print "ActiveBool is " . $objCustomer->getActiveBool() . "<br />";
    print "Date is " . $objCustomer->getCreateDate() . "<br />";
    print "Active is " . $objCustomer->getActive() . "<br />";

    print "Saving...<br />";

    $objCustomer->Save();

    echo  "<br>";

    $id = $objCustomer->getID();
    print "ID in database is " . $id . "<br />";

    print "Destroying object...<br />";
    unset($objCustomer);

    print "Recreating object from ID $id<br />";
    $objCustomer = new Customer($objPDO, $id);

    print "Store ID is " . $objCustomer->getStoreID() . "<br />";
    print "First name is " . $objCustomer->getFirstName() . "<br />";
    print "Last name is " . $objCustomer->getLastName() . "<br />";
    print "Email is " . $objCustomer->getEmail() . "<br />";
    print "Address is " . $objCustomer->getAddressID() . "<br />";
    print "ActiveBool is " . $objCustomer->getActiveBool() . "<br />";
    print "Date is " . $objCustomer->getCreateDate() . "<br />";
    print "Active is " . $objCustomer->getActive() . "<br />";

    print "Committing a change.... Steve will become Steven, 
           Nowicki will become Nowickcow<br/>";
    $objCustomer->setFirstName("Steven");
    $objCustomer->setLastName("Nowickcow");
    print "Saving...<br />";
    $objCustomer->Save();
?>