<?php

namespace App\Controller;

use App\Entity\Farmacia;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Controller;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

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
    public function insert(Request $request, PaginatorInterface $paginator){

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

        /** con paginator */

        $query = $this->em->getRepository(Post::class)->findAllPostConPaginator();

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5/*limit per page*/
        );

        return $this->render('post/index.html.twig', [
            'form' => $form->createView(),
            'posts' => $pagination,
            
        ]);

        

    }

    #[Route('/post/details/{id}', name: 'postDetails')]
    public function postdetails(Post $post){

        return $this->render('post/post-details.html.twig', ['post' => $post]);
    }
/*
    #[Route('/Likes', name: 'Likes')]
    */
    
    /**
     * @Route("/Likes", options={"expose"=true}, name="Likes")
     */
    public function Like(Request $request){
        if($request->isXmlHttpRequest()){
          // $consult = $this->em->getRepository(Post::class)->findAllPost();
           $posts = $this->em->getRepository(Post::class)->findAllPost(); 
           $user = $this->getUser();
           $id = $request->request->get('id');
           $post = $this->em->getRepository(Post::class)->find($id);
           
        }else{
            throw new \Exception('Me queire hackear???');
        }
    }

}
