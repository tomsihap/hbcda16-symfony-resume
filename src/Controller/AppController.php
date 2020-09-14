<?php
namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController {

    /**
     * @Route("/", name="app_index", methods={"GET"})
     */
    public function index() : Response {
        return $this->redirectToRoute('media_index');
    }

    /**
     * @Route("/search", name="app_search", methods={"GET"})
     */
    public function search(Request $request, MediaRepository $mediaRepository): Response {

        $query = $request->query->get('q');

        $medias = $mediaRepository->search($query);

        return $this->render('media/index.html.twig', [
            'medias' => $medias,
            'search' => true
        ]);
    }
}