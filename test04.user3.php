<?php
        /*Substitueix la paraula require per tot el codi de la clase Pdofactori*/
        require("class.pdofactory.php");
        
        /*Substitueix la paraula require per tot el codi de la clase abstracta*/
        require("abstract.databoundobject.php");

        /*Substitueix la paraula require per tot el codi de la clase user*/
        require("class.user3.php");

        print "Running...<br />";

        /*Crear la connection string*/
        $strDSN = "pgsql:dbname=chapterseven;host=localhost;port=5432";

        /*Obte la conexió*/
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());

        /*Asigna els parametres*/
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*crea un objete de la clase user*/
        $objUser = new User($objPDO);
        /*asigna el nom, cognom i data a el objecte objuser */
        
        $objUser->setFirstName("Steve");
        $objUser->setLastName("Nowicki");
        $objUser->setDateAccountCreated(date("Y-m-d"));

        /*Obte el nom i el cognom*/
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";

        print "Saving...<br />";

        /*guarda el objecte objuser*/
        $objUser->Save();


        /*Obte la id i la fixa*/
        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";

        print "Destroying object...<br />";

        /*Elimina el objecte objuser*/
        unset($objUser);

        print "Recreating object from ID $id<br />";

        /*Crea el objecte de la clase user*/
        $objUser = new User($objPDO, $id);


        /*Obte el nom i el cognom*/
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";

        print "Committing a change.... Steve will become Steven, Nowicki will become Nowickcow<br/>";
        $objUser->setFirstName("Steven");
        $objUser->setLastName("Nowickcow");
        print "Saving...<br />";
        $objUser->Save();

        $objUser->MarkForDeletion();
        $objUser->__destruct();
?>