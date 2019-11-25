<?php
 
$this->titre = "Mon Blog - " . $article['titre']; 
?>

<div class="jumbotron jumbotron-header text-center" style="margin-bottom:0">
    <h1>Jean Forteroche</h1>
    <p>Blog du roman "Billet simple pour l'Alaska" </p> 
</div>

<div class="container pageArticle" style="margin-top:30px">
    <div class="row single_post ">
        <div class="col-sm-12">
            <article class="single_article">
                <div class="enteteArticle">
                    <h2 class="titreArticle"><?= $article['titre'] ?></h2>
                    <?php if ($article['media'] != NULL) { ?>
                        <img class="imageArticle" src="Contenu/<?= $article['media'] ?>" alt="image paysage Alaska">
                    <?php } else { ?>
                        <img class="imageArticle" src="Contenu/defaut_image.gif" alt="image par défaut">
                    <?php } ?>
                </div>
                <div class="txtArticle"><p><?= $article['contenu'] ?></p></div>
                <div class="articlePrevNext">
                    <?php if ($prevArticle != False) { ?>
                        <a href="Article-<?= $prevArticle ?>" class="btn btn_Prev">< Précédent</a> 
                    <?php } 
                    if ($nextArticle != False) { ?>
                        <a href="Article-<?= $nextArticle ?>" class="btn btn_Next">Suivant ></a>  
                    <?php } ?>
                </div>
            </article>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-4 single_post addComment">
            <div class="form-group col-sm-12">
                <h3 id="titreReponses">Ajouter un commentaire :</h3>
                <hr>
                <form method="post" action="index.php?action=commenter">
                    <input class="form-control" id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
                           required /><br />
                    <textarea class="form-control" id="txtCommentaire" name="contenu" rows="3"
                              placeholder="Votre commentaire" required></textarea><br />
                    <input class="form-control" type="hidden" name="id" value="<?= $article['id'] ?>" />
                    <input class="form-control btn-success" type="submit" value="Commenter" /> 
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-8 single_post viewComment">
            <div class="col-sm-12">
                <header>
                    <h3 id="titreReponses">Commentaires à "<?= $article['titre'] ?>"</h3>
                </header>
                <?php 
                if ($nbrCommentaire != NULL) {
                    foreach ($commentaire as $commentaire): ?>
                    <hr>
                    <div class="row">   
                        <div class="col-sm-10 btnComment">                
                            <p class="textCommentaire">
                                <em><?= htmlspecialchars($commentaire['auteur']) ?></em> dit :<br />
                                <em><?= $commentaire['date'] ?></em><br /><br>
                                <?= htmlspecialchars($commentaire['contenu']) ?><br />
                            </p>
                        </div>
                        <div class="col-sm-2 btnComment">
                            <form method="post" action="index.php?action=reportComment&id= <?= $commentaire['id'] ?>">
                                <input class="form-control" type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <input class="form-control btn-danger" type="submit" name="signaler" value="Signaler" /> 
                            </form>
                        </div>
                    </div>
                    <?php endforeach;
                } else { ?>
                    <p class="sansCommentaire">Il n'y a aucun commentaire sur cet article.<br>
                    Soyez le premier à donner votre avis !</p>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
