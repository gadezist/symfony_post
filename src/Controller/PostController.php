<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param PostRepository $postRepository
     */
    public function index(PostRepository $postRepository)
    {
        $postsAll = $postRepository->findAll();

       return $this->render("post/index.html.twig", ['postAll' => $postsAll]);
    }
}
