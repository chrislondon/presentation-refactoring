<?php

function refactoredDisplayFirstFiveUsers(array $post)
{
	for ($i = 0; $i < 5; $i++) {
		echo 'Name: ' . $post[$i]['name'] . "\n" .
			'Occupation: ' . $post[$i]['occupation'] . "\n";
	}
}

function optimizedDisplayFirstFiveUsers(array $post)
{
	echo 'Name: ' . $post[0]['name'] . "\n" .
		'Occupation: ' . $post[0]['occupation'] . "\n" .
		'Name: ' . $post[1]['name'] . "\n" .
		'Occupation: ' . $post[1]['occupation'] . "\n" .
		'Name: ' . $post[2]['name'] . "\n" .
		'Occupation: ' . $post[2]['occupation'] . "\n" .
		'Name: ' . $post[3]['name'] . "\n" .
		'Occupation: ' . $post[3]['occupation'] . "\n" .
		'Name: ' . $post[4]['name'] . "\n" .
		'Occupation: ' . $post[4]['occupation'] . "\n";
}

$users = array(
	array('name' => 'UserA', 'occupation' => 'OccupationA'),
	array('name' => 'UserB', 'occupation' => 'OccupationB'),
	array('name' => 'UserC', 'occupation' => 'OccupationC'),
	array('name' => 'UserD', 'occupation' => 'OccupationD'),
	array('name' => 'UserE', 'occupation' => 'OccupationE'),
	array('name' => 'UserF', 'occupation' => 'OccupationF'),
	array('name' => 'UserG', 'occupation' => 'OccupationG'),
	array('name' => 'UserH', 'occupation' => 'OccupationH'),
	array('name' => 'UserI', 'occupation' => 'OccupationI'),
	array('name' => 'UserJ', 'occupation' => 'OccupationJ'),
);

$refactoredStartTime = microtime(true);
for ($i = 0; $i < 10000; $i++)
{
	refactoredDisplayFirstFiveUsers($users);
}
$refactoredStopTime = microtime(true);
$refactoredTotalTime = $refactoredStopTime - $refactoredStartTime;

$optimizedStartTime = microtime(true);
for ($i = 0; $i < 10000; $i++)
{
	optimizedDisplayFirstFiveUsers($users);
}
$optimizedStopTime = microtime(true);
$optimizedTotalTime = $optimizedStopTime - $optimizedStartTime;

echo "\n\n";
echo "Refactored time took: $refactoredTotalTime seconds\n";
echo "Optimized time took: $optimizedTotalTime seconds\n";
echo ($refactoredTotalTime < $optimizedTotalTime ? 'REFACTORED' : 'OPTIMIZED') . " wins!\n";

