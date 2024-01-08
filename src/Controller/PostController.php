<?php

namespace App\Controller;

use App\Entity\Farmacia;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{

    private $em;

    /**
     * @param $em
     */

     public function __construct(EntityManagerInterface $em)
     {
        $this->em = $em;
     }

    #[Route('/post/{id}', name: 'app_post')]
    public function index($id): Response
    {

        $posts = $this->em->getRepository(Post::class)->findAll();

        $custom_post = $this->em->getRepository(Post::class)->findPost($id);

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'custom_post' => $custom_post
        ]);
    }

    #[Route('/', name: 'insert_post')]
    public function insert(Request $request){

        $post = new Post();
        $posts = $this->em->getRepository(Post::class)->findAllPost();
        /*$farmacia = $this->em->getRepository(Farmacia::class)->findAllFarmacia();*/
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->em->getRepository(User::class)->find(1);
            $post->setUser($user);
            $this->em->persist($post);
            $this->em->flush();

            return $this->redirectToRoute('insert_post');
        }

        return $this->render('post/index.html.twig', [
            'form' => $form->createView(),
            'posts' => $posts,
            
        ]);
    }
}
