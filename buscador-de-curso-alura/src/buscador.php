<?php 

namespace Alura\BuscadorDeCursos;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\ClientInterface;

class Buscador
{
 	private $httpClient;
 	private $crawler;

	public function __construct(ClientInterface $httpClient, Crawler $crawler)
	{
		$this->httpClient = $httpClient;
		$this->crawler = $crawler;
	}

	public function buscar(string $url): array
	{
		$resposta = $this->httpClient-> request('GET', $url);

		$html = $resposta->getBody();
		$this->crawler->addHtmlContent($html);

		$elementosCursos = $this->crawler->filter('span.card-curso__nome');
		$cursos = [];

		foreach($elementosCursos as $elemento){

			$cursos[] = $elemento->textContent;
		}

		return $cursos;
	}
}