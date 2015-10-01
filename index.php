<?php
ini_set('display_errors', true);
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$md5Filter = new Twig_SimpleFilter('md5', function($string){
	return md5($string) . $int;
});


$twig->addFilter($md5Filter);

$lexer = new Twig_Lexer($twig, array(
	'tag_block' => array('{', '}'),
	'tag_variable' => array('{{', '}}')
	));

$twig->setLexer($lexer);

echo $twig->render('hello.html', array(
	'name' => 'Thomas',
	'age' => 22,
	'users' => array(
		array('name' => 'Max', 'age' => 18),
		array('name' => 'Gandalf', 'age' => 234),
		array('name' => 'Billy', 'age' => 11)
	)
));

