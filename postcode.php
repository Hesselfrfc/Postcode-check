<?

$fileName = "postcodes.csv";
$fp = fopen($fileName,"r");
if( $fp == false )
{
  echo ( "Error in opening file" );
  exit();
}
  
while(!feof($fp))
{
    $zipcode = fgetcsv($fp)[0];
    echo $zipcode . "<br/>";
    if(strlen($zipcode) == 6 || strlen($zipcode) == 7){
        echo "dit postcode bestaat uit 6 of 7 karakters" . "<br/>";
        $first = substr($zipcode, 0, 4);
        if (is_numeric($first)){
            echo "de eerste 4 karakters zijn nummers" . "<br/>";
            $last1 = substr($zipcode, 4, 5);
            $last2 = substr($zipcode, 5, 6);
            if(ctype_alpha($last1) || ctype_alpha($last2)){
                echo "de laatste 2 karakters zijn letters" . "<br/>";
                echo "postcode geldig!" . "<br/>" . "<br/>";
            }else{
                echo "postcode ongeldig, de laatste 2 karakters zijn geen letters" . "<br/>" , "<br/>";
            }
        }else{
            echo "postcode ongeldig, de eerste 4 karakters zijn geen cijfers" . "<br/>" . "<br/>";
        }
    }else{
        echo "postcode ongeldig, postcode bestaat niet uit 6 of 7 karakters" . "<br/>" . "<br/>";
    }
}

?>