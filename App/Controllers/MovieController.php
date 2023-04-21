<?php

namespace Projet\Controllers;

use Projet\Models\Comment;
use Projet\Models\Movie;
use Projet\Models\Rating;

class MovieController
{
    // Adds a new movie
    public function add()
    {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['title']) && !empty($_POST['releaseDate']) && !empty($_POST['director']) && !empty($_POST['synopsis']) && !empty($_POST['casting']) && !empty($_POST['picture']) && !empty($_POST['duration']) && !empty($_POST['dateAdded']) && !empty($_POST['idGenre'])) {

                // Sanitize user input
                $title = htmlspecialchars($_POST['title']);
                $releaseDate = htmlspecialchars($_POST['releaseDate']);
                $director = htmlspecialchars($_POST['director']);
                $synopsis = htmlspecialchars($_POST['synopsis']);
                $casting = htmlspecialchars($_POST['casting']);
                $picture = htmlspecialchars($_POST['picture']);
                $duration = htmlspecialchars($_POST['duration']);
                $dateAdded = htmlspecialchars($_POST['dateAdded']);
                $idGenre = htmlspecialchars($_POST['idGenre']);

                // Create a new movie object and call its add method with the sanitized user input
                $movie = new Movie();
                $movie->add($title, $releaseDate, $director, $synopsis, $casting, $picture, $duration, $dateAdded, $idGenre);

                // Redirect the user to another page
                header('Location: indexAdmin.php?action=addMovie');
            } else {
                // If the user did not fill out all required fields, display an error message
                echo "Veuillez remplir tous les champs";
            }
        }
        // Load the view for adding a movie
        require('./App/Views/Admin/AddMovie.php');
    }

    // Delete a movie
    public function delete($idMovie)
    {
        if (isset($_POST['idMovie'])) {
            if (!empty($_POST['idMovie'])) {
                $idMovie = $_POST['idMovie'];
                // Create an instance of the movie model
                $movie = new Movie();

                // Call the movie deletion function
                $result = $movie->delete($idMovie);

                // Check if the deletion was successful
                if ($result) {
                    // Redirect the user to another page
                    header('Location: index.php?action=allMovies ');
                } else {
                    // Display an error message
                    echo "Une erreur s'est produite.";
                }
            }
        }
        // Load the view for deleting a movie
        require('./App/Views/Admin/AddMovie.php');
    }

    // Method for getting all movies
    public function getAllMovies()
    {
        // Get all movies
        $movie = new Movie();
        $movies = $movie->getAllMovies();

        // Get the comments for each movie
        $commentObj = new Comment();
        $allMoviesComments = array();
        foreach ($movies as $movie) {
            $comments = $commentObj->getAllByIdMovie($movie['IdMovie']);
            $allMoviesComments[$movie['IdMovie']] = $comments;
        }

        // Get the average rating for each movie
        $ratingObj = new Rating();
        $allMoviesRatings = array();
        foreach ($movies as $movie) {
            $rating = $ratingObj->getAverageByIdMovie($movie['IdMovie']);
            $allMoviesRatings[$movie['IdMovie']] = $rating;
        }

        // Load the view for displaying all movies
        require('./App/Views/Front/AllMovies.php');
    }

    // Method for displaying the home page
    public function goHome()
    {
        // Get all movies and the 4 most recently added ones
        $movie = new Movie();
        $movies = $movie->getAllMovies();
        $latestMovies = $movie->getLatestMovies();

        // Get comments for the 4 most recently added movies
        $commentObj = new Comment();
        $allMoviesComments = array();
        foreach ($latestMovies as $movie) {
            $comments = $commentObj->getAllByIdMovie($movie['IdMovie']);
            $allMoviesComments[$movie['IdMovie']] = $comments;
        }

        // Get ratings for the 4 most recently added movies
        $ratingObj = new Rating();
        $allMoviesRatings = array();
        foreach ($latestMovies as $movie) {
            $rating = $ratingObj->getAverageByIdMovie($movie['IdMovie']);
            $allMoviesRatings[$movie['IdMovie']] = $rating;
        }

        // Load the view for the home page
        require('./App/Views/Front/Home.php');
    }

    // Method for getting the top rated movies
    public function getTopRatedMovies()
    {
        // Get the top 3 movies by rating
        $movies = new Movie();
        $topRatedMovies = $movies->getTopRatedMovies();

        // Get the comments for each top rated movie
        $commentObj = new Comment();
        $allMoviesComments = array();
        foreach ($topRatedMovies as $movie) {
            $comments = $commentObj->getAllByIdMovie($movie['IdMovie']);
            $allMoviesComments[$movie['IdMovie']] = $comments;
        }

        // Get the ratings for each top rated movie
        $ratingObj = new Rating();
        $allMoviesRatings = array();
        foreach ($topRatedMovies as $movie) {
            $rating = $ratingObj->getAverageByIdMovie($movie['IdMovie']);
            $allMoviesRatings[$movie['IdMovie']] = $rating;
        }

        // Load the view for displaying the top rated movies
        require('./App/Views/Front/TopMovies.php');
    }

    // Method for getting a movie by ID
    public function getMovieById()
    {
        if (isset($_GET['idMovie'])) {
            $idMovie = $_GET['idMovie'];
            $movie = new Movie();
            $movieInfo = $movie->getMovieById($idMovie);

            // Load the view for displaying a single movie
            require('./App/Views/Front/Movie.php');
        }
    }

    // Method for getting the 4 most recently added movies
    public function getLatestMovies()
    {
        // Get the 4 most recently added movies
        $movies = new Movie();
        $latestMovies = $movies->getLatestMovies();

        // Load the view for displaying the latest movies
        require('./App/Views/Front/Home.php');
        return $latestMovies;
    }
}
