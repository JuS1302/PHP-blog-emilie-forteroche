<div class="adminHeader">
    <h2>Monitoring des articles</h2>

    <a class="monitoringButton" href="index.php?action=admin">
        Retour
    </a>
</div>

<div class="adminArticle adminMonitoring">

    <!-- Ligne d'en-tête -->
    <div class="articleLine headerLine">
        <div class="title">Titre</div>
        <div class="content">Vues</div>
        <div class="content">Commentaires</div>
        <div class="content">Date</div>
    </div>

    <!-- Lignes du tableau -->
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= htmlspecialchars($article->getTitle()) ?></div>
            <div class="content"><?= $article->getViews() ?></div>
            <div class="content"><?= $article->getCommentCount() ?></div>
            <div class="content"><?= $article->getDateCreation()?->format("d/m/Y") ?></div>
        </div>
    <?php } ?>

</div>
