<?php 


class Manuscript

{

	


	private $manuscript = null;



	/**
	 *
	 * keeps the manuscript in memory
	 * @param [type] $manuscript [manuscript]
	 * @return null 
	 * 
	 */
	
	public function __construct($manuscript)

	{

		$this->manuscript = strtolower($manuscript);

	}




	public function words()

	{

		return explode(" ", $this->manuscript);

	}



	
	public function chunk($length=6)

	{

		$words = $this->words();

		$array_chunks = array_chunk($words, $length);

		return $this->finalize_chunks($array_chunks);

	}



	public function originality( $syllable )

	{



	}



	public function report()

	{
		return [];

	}








	private function finalize_chunks( $array_chunks )

	{

		$chunks = array();


		foreach( $array_chunks as $key => $syllables)

		{

			$chunks[] = implode(" ", $syllables);

		}

		return $chunks;

	}



}


// append 

$existing = "hello world, my name is pasty kwasi asamoah. and i'm from ghana. i hope you love this work like i do";

$work = "Hello world, my name is pasty asamoah. And i'm from Ghana";



$manuscript = new Manuscript( $work );

$words = $manuscript->words();

$chunks = $manuscript->chunk(3);





echo "<pre>";

print_r($chunks);

// foreach($chunks as $syllable)

// {

// 	$Manuscript->originality($syllable);

// }

// $report = $Manuscript->report();



//--------
// number of words words(), 
//-----------