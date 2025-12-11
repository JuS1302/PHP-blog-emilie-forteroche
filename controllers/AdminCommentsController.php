<?php

class AdminCommentsController
{
    public function showComments() : void
    {
        Utils::checkIfUserIsConnected();

        $idArticle = Utils::request("id", -1);

        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);

        if (!$article) {
            throw new Exception("Article introuvable.");
        }

        $commentManager = new CommentManager();
        $comments = $commentManager->getAllCommentsByArticleId($idArticle);

        $view = new View("Admin Comments");
        $view->render("adminComments", [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function deleteComment() : void
    {
        Utils::checkIfUserIsConnected();

        $idComment = Utils::request("id");
        $idArticle = Utils::request("idArticle");

        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($idComment);

        if (!$comment) {
            throw new Exception("Commentaire introuvable.");
        }

        $commentManager->deleteComment($comment);

        // Retour sur la liste des commentaires du même article
        Utils::redirect("adminComments", ['id' => $idArticle]);
    }
}
