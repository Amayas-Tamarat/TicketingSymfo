<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class TicketController extends AbstractController
{
    public function __construct(private TicketRepository $ticketRepository)
    {

    }
    #[Route('', name: 'home')]
    public function index(): Response
    {
        $tickets = $this->ticketRepository -> findAll();
        return $this->render('ticket/index.html.twig', [
            'controller_name' => 'TicketController',
            'tickets' => $tickets,
        ]);
    }
    #[Route('/ticket/{ticketId}', name: 'ticket_show')]
    public function showticket(int $ticketId){
        $ticket = $this->ticketRepository -> find($ticketId);
        return $this -> render ('ticket/show.html.twig',[
            "ticket" => $ticket, 
        ]);
    }
}
