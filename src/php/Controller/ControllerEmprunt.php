<?php

require_once "../Model/ModelEmprunt.php";

$action = $_GET["action"] ?? "read";
$actions = get_class_methods("ControlleurEmprunt");
if (in_array($action, $actions))
    ControlleurEmprunt::$action();

class ControlleurEmprunt
{

    static function readAll()
    {
        $emprunts = ModelEmprunt::selectAll();
        echo json_encode($emprunts);
    }

    static function create()
    {
        $emprunt = [
            "idAdherent" => $_POST["idAdherent"],
            "idLivre" => $_POST["idLivre"]
        ];
        ModelEmprunt::save($emprunt);
    }

    static function delete()
    {
        $idLivre = $_GET["id"]; //idLivre
        ModelEmprunt::delete($idLivre);
    }

    static function rendreEmprunt(){
        $idAdherent = $_POST["idAdherent"];
        $idLivre = $_POST["idLivre"];
        ModelEmprunt::rendreEmprunt($idAdherent,$idLivre);
    }
    static function getEmprunts(){
        $livreEmprunt = ModelEmprunt::getEmprunts();
        echo json_encode($livreEmprunt);
    }
}