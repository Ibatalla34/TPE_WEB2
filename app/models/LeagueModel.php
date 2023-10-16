<?php
class LeagueModel{

function getFutbolistasbyClubes ($clubes){
    $db= new PDO('mysql:host=localhost;'.'dbname=db_clubes;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM futbolistas WHERE clubes = ?');
    $query->execute([$clubes]);
    $futbolistas = $query->fetchAll(PDO::FETCH_OBJ);
    return $movies;
}

}