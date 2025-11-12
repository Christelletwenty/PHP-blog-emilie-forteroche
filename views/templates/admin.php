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
    <table class="articleTable">
        <thead>
            <tr>
                <th class="<?= $sortField === 'title' ? 'active' : ''; ?>">
                    Titre
                    <a href="index.php?action=admin&sortField=title&sortOrder=<?= $sortOrder ?>">
                        <?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?>
                    </a>
                </th>
                <th class="<?= $sortField === 'content' ? 'active' : ''; ?>">
                    Article
                    <a href="index.php?action=admin&sortField=content&sortOrder=<?= $sortOrder ?>">
                        <?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?>
                    </a>
                </th>
                <th class="<?= $sortField === 'views' ? 'active' : ''; ?>">
                    Vues
                    <a href="index.php?action=admin&sortField=views&sortOrder=<?= $sortOrder ?>">
                        <?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?>
                    </a>
                </th>
                <th class="<?= $sortField === 'date_creation' ? 'active' : ''; ?>">
                    Date
                    <a href="index.php?action=admin&sortField=date_creation&sortOrder=<?= $sortOrder ?>">
                        <?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?>
                    </a>
                </th>
                <th class="<?= $sortField === 'commentCount' ? 'active' : ''; ?>">
                    Nb. comm.
                    <a href="index.php?action=admin&sortField=commentCount&sortOrder=<?= $sortOrder ?>">
                        <?= $sortOrder === 'asc' ? '⬆' : '⬇'; ?>
                    </a>
                </th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <td class="title"><?= $article->getTitle() ?></td>
                    <td class="content"><?= $article->getContent(200) ?></td>
                    <td class="content"><?= $article->getViews() ?></td>
                    <td class="content"><?= $article->getDateCreation()->format('d/m/Y') ?></td>
                    <td class="content"><?= $article->getCommentCount() ?></td>
                    <td><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></td>
                    <td><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>