<?php foreach ($movies as $movie) : ?>
    <div class="modal fade" id="movieModal<?php echo $movie['IdMovie']; ?>" tabindex="-1" role="dialog" aria-labelledby="movieModalLabel<?php echo $movie['IdMovie']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" title="Détails Film" href="#detailsTab<?php echo $movie['IdMovie']; ?>" role="tab">Détails</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" title="Votre avis" href="#ratingTab<?php echo $movie['IdMovie']; ?>" role="tab">Votre avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" title="Tous les commentaires" href="#commentsTab<?php echo $movie['IdMovie']; ?>" role="tab">Tous les commentaires</a>
                        </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body mx-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="detailsTab<?php echo $movie['IdMovie']; ?>" role="tabpanel">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="modal-title text-uppercase" id="movieModalLabel<?php echo $movie['IdMovie']; ?>"><?php echo $movie['Title']; ?></h5>
                                </div>
                                <div class="col-3 text-right">
                                    <small>Note: <?php echo $allMoviesRatings[$movie['IdMovie']]; ?>/5</small>
                                </div>
                            </div>
                            <p>Année de sortie : <?php echo $movie['ReleaseDate']; ?></p>
                            <p>Réalisateur : <?php echo $movie['Director']; ?></p>
                            <p>Casting : <?php echo $movie['Casting']; ?></p>
                            <p>Résumé : <?php echo $movie['Synopsis']; ?></p>
                        </div>

                        <div class="tab-pane" id="ratingTab<?php echo $movie['IdMovie']; ?>" role="tabpanel">
                            <form method="post" action="index.php?action=addComment">
                                <p>Donnez-nous votre avis</p>
                                <div class="form-group">
                                    <label for="comment_text">Commentaire :</label>
                                    <textarea class="form-control h-100" name="comment" id="comment" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Note :</label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1"><span class="fas fa-star" data-star="1"></span></label>
                                    <input type="radio" name="rating" value="2" id="star2"><label for="star2"><span class="fas fa-star" data-star="2"></span></label>
                                    <input type="radio" name="rating" value="3" id="star3"><label for="star3"><span class="fas fa-star" data-star="3"></span></label>
                                    <input type="radio" name="rating" value="4" id="star4"><label for="star4"><span class="fas fa-star" data-star="4"></span></label>
                                    <input type="radio" name="rating" value="5" id="star5"><label for="star5"><span class="fas fa-star" data-star="5"></span></label>
                                </div>
                                <input type="hidden" name="idMovie" value="<?php echo $movie['IdMovie']; ?>">
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>

                        <div class="tab-pane" id="commentsTab<?php echo $movie['IdMovie']; ?>" role="tabpanel">
                            <ul class="list-group">
                                <?php foreach ($allMoviesComments[$movie['IdMovie']] as $comment) : ?>
                                    <li class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?php echo $comment['Pseudo']; ?></h5>
                                            <small><?php echo date('d/m/Y', strtotime($comment['DateAdded'])); ?></small>
                                        </div>
                                        <p class="mb-1"><?php echo $comment['Comment']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>