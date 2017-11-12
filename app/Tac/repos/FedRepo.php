<?php namespace Tac\Repos;

    $fedtotals = array();
    $x=0;

    class FedRepo
    {
        public function execFed()
        {
            print "INSTRUCTIONS:\nEnter Coin names, followed by the number of coins needed to reach the sum total, each separated by a comma.\nEnter the unit coin name and value last.\nExample: Quarters,4,Dimes,10,Nickles,20,Pennies,100\n";

            $fh = fopen('php://stdin', 'r');
            $input  = fgets($fh, 1024);


            $arrayOfElements = explode(",", $input);
            $sum = array_values(array_slice($arrayOfElements, -1))[0];

            var_dump($sum);


            $keys = [];
            $values = [];
            for($i=0; $i<count($arrayOfElements); $i++){
                if( $i % 2 == 0){
                    $keys[] = $arrayOfElements[$i];
                }else{
                    $values[] = (int)$sum/$arrayOfElements[$i];
                }
            }



            function getAllFedCombinations($ind, $denom, $n, $vals=array()){
                global $fedtotals, $x;
                if ($n == 0){
                    foreach ($vals as $key => $qty){
                        for(; $qty>0; $qty--){
                            $fedtotals[$x][] = $denom[$key];
                         }
                    }
                    $x++;
                    return;
                }
                if ($ind == count($denom)) return;
                $currdenom = $denom[$ind];
                for ($i=0;$i<=($n/$currdenom);$i++){
                    $vals[$ind] = $i;
                    getAllFedCombinations($ind+1,$denom,$n-($i*$currdenom),$vals);
                }
            }


            getAllFedCombinations(0, $values, $sum);

            global $fedtotals, $x;

            foreach ($keys as $key ) {
                echo $key ."\t";
            }
            echo PHP_EOL;



            foreach ($fedtotals as $subArray) {
                $vars = [];
                foreach ($values as $item) {
                    $vars [] = count(array_keys($subArray, $item));
                }

                foreach ($vars as $var ) {
                    echo $var ."\t";
                }
                echo PHP_EOL;
            }

            echo "Count : ". count($fedtotals).PHP_EOL;
        }
    }

