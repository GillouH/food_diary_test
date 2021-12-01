<?php

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiaryControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp():void {
        $this->client = static::createClient();
    }

    public function urlListe(){
        return [
            ["/"],
            ["/diary/list"],
            ["/diary/add-new-record"],
            ["/diary/record"]
        ];
    }

    /**
     * @dataProvider urlListe
     */
    public function testPageIsUp($url){
        $this->client->request("GET", $url);
        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    public function testHomepage(){
        $crawler = $this->client->request("GET", "/");
        $this->assertSame(
            1,
            $crawler->filter("html:contains(\"Bienvenue sur FoodDiary !\")")->count()
        );
    }

    public function testAddRecord() {
        $crawler = $this->client->request("GET", "/diary/add-new-record");
        $form = $crawler->selectButton("Ajouter")->form();
        $form["food[username]"] = "John Doe";
        $form["food[entitled]"] = "Plat de pâtes";
        $form["food[calories]"] = 600;
        $crawler = $this->client->submit($form);
        echo $this->client->getResponse()->getContent();
    }
}
