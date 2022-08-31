<?php 

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = New Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = New Crawler();

$buscador = New Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
	
	echo $curso . PHP_EOL;
}