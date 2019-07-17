<?php
require ('question.php');
class QuestionList
{
    public $questionList = [];//create questionList array
    public function parse()
    {
        $file = fopen("question.md", "r") or die ("unable");
        $line = '';

        while(!feof($file)){
            $line = fgets($file);
            if(strpos($line, '######') !== false){
                
                $temp = new Question;
                while(!feof($file)){
                    $temp->questionContent .= $line;
                    $line = fgets($file);
                    if(strpos($line , 'Đáp án') !== false){
                        while(!feof($file)){
                            $line = fgets($file);
                            $temp->answer .= $line;
                            if(strpos($line, '---') !== false){
                                break;
                            }
                        }
                        break;
                    }
                    
                }
                array_push($this->questionList, $temp);
            }
        }
        
    }
}
//$a = new QuestionList;
//$a->parse();
//echo '<pre>'; print_r($a); echo '</pre>';
