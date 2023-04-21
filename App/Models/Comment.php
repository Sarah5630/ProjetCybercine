<?php namespace Projet\Models;

use PDO;

class Comment extends Manager
{
    // Add a comment to a movie
    public function add($dateAdded, $comment, $approved, $idMovie, $pseudo)
    {
        $db = $this->manager();
        $req = $db->prepare('INSERT INTO comments (DateAdded, Comment, Approved, IdMovie, Pseudo ) VALUES (:dateAdded, :comment, :approved, :idMovie, :pseudo)');

        // Bind the values
        $req->bindValue(':dateAdded', $dateAdded, PDO::PARAM_STR);
        $req->bindValue(':comment', $comment, PDO::PARAM_STR);
        $req->bindValue(':approved', $approved, PDO::PARAM_INT);
        $req->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        // Execute the query
        $req->execute();
        return $req;
    }

    // Delete a comment
    public function delete($idComment)
    {
        $bdd = $this->manager();
        $req = $bdd->prepare('DELETE FROM comments WHERE IdComment = :idComment');
        $req->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    // Get all comments for a movie by ID
    public function getAllByIdMovie($idMovie)
    {
        $db = $this->manager();
        $req = $db->prepare("SELECT comments.Idcomment, comments.DateAdded, comments.Comment, comments.Approved, comments.IdMovie, comments.Pseudo FROM comments WHERE comments.IdMovie = :idMovie ORDER BY comments.DateAdded");
        $req->bindParam(':idMovie', $idMovie, PDO::PARAM_INT);
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }

}
