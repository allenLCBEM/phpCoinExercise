<?php namespace Tac\repos;
		
	$totals = array();
	$x=0;


	class CoinRepo
	{	
		public function getAllCombinations($ind, $denom, $n, $vals=array()){
			    global $totals, $x;
			    if ($n == 0){
			        foreach ($vals as $key => $qty){
			            for(; $qty>0; $qty--){
			                $totals[$x][] = $denom[$key];
			             }
			        }
			        $x++;
			        return;
			    }
			    if ($ind == count($denom)) return;
			    $currdenom = $denom[$ind];
			    for ($i=0;$i<=($n/$currdenom);$i++){
			        $vals[$ind] = $i;
			        $this->getAllCombinations($ind+1,$denom,$n-($i*$currdenom),$vals);
			    }
		}

		public function getTotals(){
			global $totals;
			return $totals;
		}

		public function execute()
		{
			$array = array(1, 5, 10, 25);
			$sum = 100;

			$this->getAllCombinations(0, $array, $sum);


			$keys = array("Pennies","Nickels","Dimes","Quarters");
			foreach ($keys as $key ) {
				echo $key ."\t";
			}
			echo PHP_EOL;


			global $totals, $x;
			foreach ($totals as $subArray) {

				$noOfPennies = count(array_keys($subArray, 1));
				$noOfNickels = count(array_keys($subArray, 5));
				$noOfDimes = count(array_keys($subArray, 10));
				$noOfQuarters = count(array_keys($subArray, 25));

				echo $noOfPennies . "\t" . $noOfNickels . "\t" . $noOfDimes . "\t" . $noOfQuarters."\t";
				
				echo PHP_EOL;
			}

			echo "Count : ". count($totals).PHP_EOL;
		}
	}
