<?php

require('QuestionList.php');
$a = new QuestionList;
$a->parse();
echo '<pre>'; print_r($a); echo '</pre>';