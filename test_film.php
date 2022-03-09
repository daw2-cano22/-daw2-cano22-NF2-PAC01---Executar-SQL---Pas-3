<?php
    require("class.pdofactory.php");
    require("abstract.databoundobject.php");
    require("film.php");

    print "Running...<br />";

    $strDSN = "pgsql:dbname=dvdrental;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
        array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $objFilm = new Film($objPDO);

    $objFilm->setTitle("La invasion de los ultracuerpos");
    $objFilm->setDescription("Un caso unico de remake de un clasico absoluto que no solo iguala a su modelo, sino que a su vez se convierte tambien en un clasico por sus unicas e intransferibles razones. El tropo de los invasores que reemplazan humanos con copias perfectas no era nuevo en la ciencia-ficción (y aún tenía que dar tumbos en muy diversas direcciones, como 'La cosa'), pero en esta maravilla de Kaufman adquiere su mayor poso de critica social, en una desencantada vision de la deshumanizacion inherente a la vida en la acelerada sociedad moderna. La idea seguiria teniendo nuevas versiones, oficiosas y oficiales, alguna tan interesante como 'Body Snatchers' de Abel Ferrara, centrada en el estamento militar.");
    $objFilm->setReleaseYear(1978);
    $objFilm->setLanguageID(2);
    $objFilm->setRentalDuration(1);
    $objFilm->setRentalRate(2);
    $objFilm->setLength(-23);
    $objFilm->setReplacementCost(2.34);
    $objFilm->setRating("G");
    $objFilm->setLastUpdate("18/02/2022");
    //$objFilm->setSpecialFeatures("{La pelicula es de ciencia ficcion}");
    $objFilm->setFulltext(23);

    print "Title is " . $objFilm->getTitle() . "<br />";
    print "Description is " . $objFilm->getDescription() . "<br />";
    print "ReleaseYear is " . $objFilm->getReleaseYear() . "<br />";
    print "LanguageID is " . $objFilm->getLanguageID() . "<br />";
    print "RentalRate is " . $objFilm->getRentalDuration() . "<br />";
    print "Length is " . $objFilm->getentalRate() . "<br />";
    print "ReplacementCost is " . $objFilm->getLength() . "<br />";
    print "Rating is " . $objFilm->getReplacementCost() . "<br />";
    print "Rating is " . $objFilm->getRating() . "<br />";
    print "Rating is " . $objFilm->getLastUpdate() . "<br />";
    print "Rating is " . $objFilm->getSpecialFeatures() . "<br />";
    print "Rating is " . $objFilm->getFulltext() . "<br />";

    print "Saving...<br />";

    $objFilm->Save();

    echo  "<br>";

    $id = $objFilm->getID();
    print "ID in database is " . $id . "<br />";

    print "Destroying object...<br />";
    unset($objFilm);

    print "Recreating object from ID $id<br />";
    $objFilm = new Film($objPDO, $id);

    
    print "Title is " . $objFilm->getTitle() . "<br />";
    print "Description is " . $objFilm->getDescription() . "<br />";
    print "ReleaseYear is " . $objFilm->getReleaseYear() . "<br />";
    print "LanguageID is " . $objFilm->getLanguageID() . "<br />";
    print "RentalRate is " . $objFilm->getRentalDuration() . "<br />";
    print "Length is " . $objFilm->getentalRate() . "<br />";
    print "ReplacementCost is " . $objFilm->getLength() . "<br />";
    print "Rating is " . $objFilm->getReplacementCost() . "<br />";
    print "Rating is " . $objFilm->getRating() . "<br />";
    print "Rating is " . $objFilm->getLastUpdate() . "<br />";
    print "Rating is " . $objFilm->getSpecialFeatures() . "<br />";
    print "Rating is " . $objFilm->getFulltext() . "<br />";


    print "Committing a change.... Steve will become Steven, 
           Nowicki will become Nowickcow<br/>";
    $objFilm->setTitle("Steven");
    $objFilm->setDescription("Nowickcow");
    print "Saving...<br />";
    $objFilm->Save();
?>