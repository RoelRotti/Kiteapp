<?php

include '../util.php';
include '../solver.php';
include '../reader.php'; 

date_default_timezone_set('Europe/Amsterdam');

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'
	&& isset($_FILES['knowledgebase'])
	&& $file = process_file($_FILES['knowledgebase'], $errors))
{
	switch ($_POST['action'])
	{
		case 'analyse':
			header('Location: analyse.php?kb=' . rawurlencode('kiteapp.xml'));
			break;

		case 'run':
			header('Location: webfrontend.php?kb=' . rawurlencode('kiteapp.xml'));
			break;
	}

	exit;
}

$template = new Template('templates/single.phtml');
$template->errors = $errors;

echo $template->render();
