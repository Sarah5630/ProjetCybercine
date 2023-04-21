<?php

namespace Projet\Models;

use PDO;
// reduce the risk of sql injections


class Genre extends Manager
{

    // Add a new genre
    public function addGenre($category)
    {
        $db = $this->manager();
        $req = $db->prepare('INSERT INTO genres(Category) VALUES (:category)');
        $req->bindValue(':category', $category, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }

    // Delete the genre
    public function delete($idGenre)
    {
        $db = $this->manager();
        $req = $db->prepare("DELETE FROM genres WHERE IdGenre = :idGenre");
        $req->bindValue(':idGenre', $idGenre, PDO::PARAM_STR);
        $req->execute();
        return $req;
    }
}
