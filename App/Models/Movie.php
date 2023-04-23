<?php

namespace Projet\Models;

use PDO;

class Movie extends Manager
{
    private $idMovie;
    private $title;
    private $releaseDate;
    private $director;
    private $synopsis;
    private $casting;
    private $picture;
    private $duration;
    private $dateAdded;
    private $idGenre;

    // Constructor to initialize movie object with optional parameters
    public function __construct($idMovie = null, $title = null, $releaseDate = null, $director = null, $synopsis = null, $casting = null, $picture = null, $duration = null, $dateAdded = null, $idGenre = null)
    {

        $this->idMovie = $idMovie;
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->director = $director;
        $this->synopsis = $synopsis;
        $this->casting = $casting;
        $this->picture = $picture;
        $this->duration = $duration;
        $this->dateAdded = $dateAdded;
        $this->idGenre = $idGenre;
    }

    // Function to set movie ID
    public function setId($idMovie)
    {
        $this->idMovie = $idMovie;
    }

    // Function to add a new movie to the database
    public function add($title, $releaseDate, $director, $synopsis, $casting, $picture, $duration, $dateAdded, $idGenre)
    {
        $db = $this->manager();
        $req = $db->prepare(
            'INSERT INTO movies(title, releaseDate, director, synopsis, casting, picture, duration, dateAdded, idGenre)
            VALUES(:title, :releaseDate, :director, :synopsis, :casting, :picture, :duration, :dateAdded, :idGenre)'
        );

        // Bind the values to the parameters in the prepared statement
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':releaseDate', $releaseDate, PDO::PARAM_INT);
        $req->bindValue(':director', $director, PDO::PARAM_STR);
        $req->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
        $req->bindValue(':casting', $casting, PDO::PARAM_STR);
        $req->bindValue(':picture', $picture, PDO::PARAM_STR);
        $req->bindValue(':duration', $duration, PDO::PARAM_STR);
        $req->bindValue(':dateAdded', $dateAdded, PDO::PARAM_STR);
        $req->bindValue(':idGenre', $idGenre, PDO::PARAM_INT);

        // Execute the query
        $req->execute();

        // Set the movie's properties to the values of the added movie
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->director = $director;
        $this->synopsis = $synopsis;
        $this->casting = $casting;
        $this->picture = $picture;
        $this->duration = $duration;
        $this->dateAdded = $dateAdded;
        $this->idGenre = $idGenre;


        echo "le film a bien été ajouté";
    }

    // Function to delete a movie from the database
    public function delete($idMovie)
    {
        $db = $this->manager();
        $req = $db->prepare("DELETE FROM movies WHERE IdMovie = :idMovie");
        $req->bindValue(':idMovie', $idMovie, PDO::PARAM_INT);
        $req->execute();
    }


    public function getAllMovies()
    {
        // Connect to the database
        $db = $this->manager();

        // Prepare the SQL query to retrieve all movies and order them by date added in descending order
        $req = $db->prepare(
            "SELECT movies.IdMovie, movies.Title, movies.ReleaseDate, movies.Director, movies.Synopsis, movies.Casting, movies.Picture, movies.Duration, movies.DateAdded, movies.IdGenre FROM movies ORDER BY movies.DateAdded DESC"
        );

        // Execute the query
        $req->execute();

        // Fetch all movies as an associative array
        $movies = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return the movies array
        return $movies;
    }

    public function getTopRatedMovies()
    {
        // Get top 3
        $db = $this->manager();
        $req = $db->prepare("SELECT movies.IdMovie, movies.Title, movies.ReleaseDate, movies.Director, movies.Synopsis, movies.Casting, movies.Picture, movies.Duration, movies.DateAdded, movies.IdGenre, AVG(ratings.Rating) as average_rating, users.Pseudo
        FROM movies
        JOIN ratings ON movies.IdMovie = ratings.IdMovie
        JOIN users ON ratings.Pseudo = users.Pseudo
        GROUP BY movies.IdMovie
        ORDER BY average_rating DESC
        LIMIT 3");
        // Execute the prepared statement
        $req->execute();

        // Fetch the results as an associative array
        $topMovies = $req->fetchAll(PDO::FETCH_ASSOC);

        return $topMovies;
    }

    public function getMovieById($idMovie)
    {
        // Connect to the database
        $db = $this->manager();

        // Prepare the statement
        $req = $db->prepare("SELECT * FROM movies WHERE IdMovie = :idMovie");

        // Bind the parameter
        $req->bindValue(':idMovie', $idMovie);

        // Execute the query
        $req->execute();

        // Fetch the movie information
        $movieInfo = $req->fetch();

        // Close the statement and the database connection
        $req->closeCursor();
        $db = null;

        // Return the movie information
        return $movieInfo;
    }

    public function getLatestMovies()
    {
        // Get the 3 most recently added movies
        $db = $this->manager();
        $req = $db->prepare("SELECT * FROM movies ORDER BY DateAdded DESC LIMIT 4");
        $req->execute();

        // Fetch the latest 3 movies from the result set
        $latestMovies = $req->fetchAll(PDO::FETCH_ASSOC);

        // Return the array of latest movies
        return $latestMovies;
    }
}
