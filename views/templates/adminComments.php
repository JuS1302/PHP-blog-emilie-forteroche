<div class="adminHeader">
    <h2>Article : <?= htmlspecialchars($article->getTitle()) ?></h2>

    <a class="monitoringButton" href="index.php?action=admin">
        Retour
    </a>
</div>

<div class="adminArticle adminMonitoring">

    <!-- Ligne d'en-tête -->
    <div class="articleLine headerLine">
        <div class="title">Pseudo</div>
        <div class="content">Commentaire</div>
        <div class="content">Date</div>
        <div class="content">Actions</div>
    </div>

    <!-- Lignes du tableau -->
    <?php if (empty($comments)) { ?>

        <div class="articleLine">
            <div class="title">Aucun commentaire</div>
        </div>

    <?php } else { ?>

        <?php foreach ($comments as $comment) { ?>
            <div class="articleLine">

                <!-- PSEUDO -->
                <div class="title">
                    <?= htmlspecialchars($comment->getPseudo()) ?>
                </div>

                <!-- CONTENU -->
                <div class="content">
                    <?= nl2br(htmlspecialchars($comment->getContent())) ?>
                </div>

                <!-- DATE -->
                <div class="content">
                    <?= $comment->getDateCreation()->format("d/m/Y H:i") ?>
                </div>

                <!-- SUPPRIMER -->
                <div class="content">
                    <a class="submit"
                       href="index.php?action=deleteComment&id=<?= $comment->getId() ?>&idArticle=<?= $article->getId() ?>"
                       <?= Utils::askConfirmation("Supprimer ce commentaire ?") ?>>
                        Supprimer
                    </a>
                </div>

            </div>
        <?php } ?>

    <?php } ?>

</div>
