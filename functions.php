<?php
//testcommit
include_once('alphaID.php');
$config = parse_ini_file('config.ini', true);

$functions = array('new_url', 'fetch_url');

if (in_array($_REQUEST['func'], $functions))
	$_REQUEST['func']();

function new_url() {
	global $config;

	$ret = array('status' => 'fail');

	$dbh = new PDO('dblib:host=' . $config['coolsitebro']['host'] . ';dbname=coolsitebro',
		$config['coolsitebro']['username'], $config['coolsitebro']['password']);

	$url = $_REQUEST['url'];
	$private = $_REQUEST['private'] || false;
	
	$sth = $dbh->prepare("insert into redirects (url, private) values (?, ?)");

	if ( !$sth ) {
		$err = $dbh->errorInfo();
		$ret['reason'] = $err[2]; // $err is an array full of 2 useless items followed by descriptive text
	}

	else if ( !$sth->execute(array($url, $attributes)) ) {
		$err = $sth->errorInfo();
		$ret['reason'] = $err[2];
	}
	
	else {
		$ret['status'] = 'success';
		$ret['data'] = alphaID($dbh->lastInsertId());
	}

	echo json_encode($ret);
}

function fetch_url() {
}

?>