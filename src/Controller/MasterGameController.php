<?php

namespace App\Controller;

use App\Classes\player;
use App\Entity\Card;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterGameController extends AbstractController
{
    protected $deck = array();
    private EntityManagerInterface $em;

    /**
     * @Route("/game", name="game")
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function index(EntityManagerInterface $manager)
    {
        $this->em = $manager;
        $this->initdeck();
        $players = array();
        $player1 = new player("player_1","Olivier",$this->getCardFromDeck(4));
        $player2 = new player("player_2","Ugo",$this->getCardFromDeck(4));
        $player3 = new player("player_3","Justin",$this->getCardFromDeck(4));
        $player4 = new player("player_4","Nathan",$this->getCardFromDeck(4));

        $decksize = (function(){
            $cpt = 0;
            for ($i = 0;$i <= 51;$i++){
                if (!$this->deck[$i]['selected'])
                    $cpt+= 1;
            }
            return $cpt;
        })();
        array_push($players,$player1,$player2,$player3,$player4);
        return $this->render('master_game/index.html.twig', [
            'players' =>$players,
            'controller_name' => 'MasterGameController',
            'decksize' => $decksize
        ]);
    }

    public function getCardFromDeck($number){
        $cards = array();
        for ($i = 0;$i <= 51;$i++){
            if (sizeof($cards) === $number)
                return $cards;
            if (!$this->deck[$i]["selected"]) {
                array_push($cards, $this->deck[$i]["card"]);
                $this->deck[$i]["selected"] = true;
            }
        }
    }

    public function initdeck(){
        for ($i = 1;$i<=14;$i++){
            $j = 0;
            if ($i === 1 || $i === 14)
                $j = 2;
            for ($j;$j<4;$j++) {
                array_push(
                    $this->deck,array("selected"=> false, "card"=>$this->em->getRepository(Card::class)->find($i))
                );
            }
        }
        shuffle($this->deck);
    }
}
