<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */

    $sortOrder = isset($_GET['sortOrder']) && $_GET['sortOrder'] === 'asc' ? 'desc' : 'asc';
    $sortField = isset($_GET['sortField']) ? $_GET['sortField'] : null;
?>

<h2>Edition des articles</h2>

<div class="adminArticle">
        <div class="articleLine header">
            <div class="title <?= $sortField === 'title' ? 'active' : ''; ?>"><a href="index.php?action=admin&sortField=title&sortOrder=<?= $sortOrder ?>"><?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?></a></div>
            <div class="content <?= $sortField === 'content' ? 'active' : ''; ?>"><a href="index.php?action=admin&sortField=content&sortOrder=<?= $sortOrder ?>"><?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?></a></div>
            <div class="content <?= $sortField === 'views' ? 'active' : ''; ?>"><a href="index.php?action=admin&sortField=views&sortOrder=<?= $sortOrder ?>"><?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?></a></div>
            <div class="content <?= $sortField === 'date_creation' ? 'active' : ''; ?>"><a href="index.php?action=admin&sortField=date_creation&sortOrder=<?= $sortOrder ?>"><?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?></a></div>
            <div class="content <?= $sortField === 'commentCount' ? 'active' : ''; ?>"><a href="index.php?action=admin&sortField=commentCount&sortOrder=<?= $sortOrder ?>"><?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?></a></div>
            <div></div>
            <div></div>
        </div>
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="content"><?= $article->getContent(200) ?></div>
            <div class="content"><?= $article->getViews()?></div>
            <div class="content"><?= $article->getDateCreation()->format('d/m/Y') ?></div>
            <div class="content"><?= $article->getCommentCount() ?></div>

            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
        </div>
    <?php } ?>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>