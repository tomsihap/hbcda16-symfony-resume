<?php

namespace App\Controller;

use App\Entity\Media;
use App\Form\MediaType;
use App\Repository\MediaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MediaController
 * @package App\Controller
 * @Route("/medias")
 */
class MediaController extends AbstractController
{
    private $mediaRepository;

    public function __construct(MediaRepository $mediaRepository) {
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * @Route("/", name="media_index")
     * @return Response
     */
    public function index() : Response
    {
        /*
        $mediaRepository = $this->getDoctrine()->getRepository(Media::class);
        $mediaById = $mediaRepository->find(1); dump($mediaById);
        $allMedias = $mediaRepository->findAll(); dump($allMedias);
        $filmSearch = $mediaRepository->findBy(['title' => 'Memento']); dump($filmSearch);
        $uniqueMedia = $mediaRepository->findOneBy(['title' => 'Memento']); dump($uniqueMedia);
        */

        return $this->render('media/index.html.twig', [
            'medias' => $this->mediaRepository->findAll()
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/new", name="media_new", methods={"GET", "POST"})
     */
    public function new(Request $request) : Response {

        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * isSubmitted => On vient du formulaire en POST
             */
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($media);
            $manager->flush();

            return $this->redirectToRoute('media_show', ['id' => $media->getId() ]);
        }

        return $this->render('media/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="media_show", methods={"GET"})
     * @param Media $media
     * @return Response
     */
    public function show(Media $media) : Response {

        return $this->render('media/show.html.twig', [
            'media' => $media
        ]);
    }
}

