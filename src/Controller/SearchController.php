<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\PropertiesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    /**
     * List all searched Properties
     *
     * @Route("/", name="search")
     * @param Request               $request
     * @param PropertiesRepository  $propertiesRepository
     * @param PaginatorInterface    $paginator KnpPaginatorBundle
     *
     * @return Response
     */
    public function index(
        Request $request,
        PropertiesRepository $propertiesRepository,
        PaginatorInterface $paginator
    ) {

        $searchForm = $this->createForm(SearchType::class);

        $searchForm->handleRequest($request);

        $query = $propertiesRepository
            ->search(
                $location = $searchForm["location"]->getData(),
                $nearBeach = $searchForm["nearBeach"]->getData(),
                $acceptsPets = $searchForm["acceptsPets"]->getData(),
                $sleeps = $searchForm["sleeps"]->getData(),
                $beds = $searchForm["beds"]->getData(),
                $startDate = $searchForm["startDate"]->getData(),
                $endDate = $searchForm["endDate"]->getData()
            );

        //Validation of dates
        if (!empty($startDate) && empty($endDate)
            || empty($startDate)
            && !empty($endDate)
        ) {
            $this->addFlash('alert', "Start Date and End Date required");
        }

        if ($endDate < $startDate) {
            $this->addFlash(
                'alert',
                "The end date cannot be before the start date"
            );
        }

        $properties = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            4
        );

        return $this->render('index.html.twig', [
            'form'       => $searchForm->createView(),
            'properties' => $properties,
        ]);
    }
}
