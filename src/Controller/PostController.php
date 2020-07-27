<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use App\Service\Censor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param PostRepository $postRepository
     */
    public function index(PostRepository $postRepository, Censor $censor)
    {
        $postsAll = $postRepository->findAll();

        foreach ($postsAll as $post) {
            $post->setTitle($censor->checkSwearWord($post->getTitle()));
            $post->setText($censor->checkSwearWord($post->getText()));
        }

       return $this->render("post/index.html.twig", ['postAll' => $postsAll]);
    }
}
