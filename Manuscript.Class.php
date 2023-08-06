<?php 


class Manuscript

{

	

	private $primary_manuscript = null;

	private $secondary_manuscript = null;

	private $chunks = [];

	private $syllables = [];



	/**
	 *
	 * keeps the manuscript in memory
	 * @param [type] $manuscript [manuscript], $stop_words_length[words upto this characters should be removed]
	 * @return null 
	 * 
	 */
	
	
	public function __construct( $manuscript, $stop_words_length = 3, $chunk_size = 6 )

	{

		$this->primary_manuscript = strtolower($manuscript);

		$this->secondary_manuscript = $this->stop_words( $stop_words_length );

		$this->syllables = explode(" ", $this->secondary_manuscript);

		$this->chunks = $this->chunk( $chunk_size );

	}




	public function primary()

	{

		
		return $this->primary_manuscript;


	}




	public function processed()

	{

		return $this->secondary_manuscript;

	}




	public function syllables()

	{

		return $this->syllables;

	}




	public function chunks()

	{

		return $this->chunks;


	}



	public function statistics()

	{

		return [

			"manuscript_word_count" => count( $this->syllables )-1,
		];



	}



	
	
	private function chunk($length=6)

	{

		$array_chunks = array_chunk($this->syllables, $length);

		return $this->format_chunks($array_chunks);

	}




	/**
	 * 
	 *
	 * remove short words like is, the, then, etc.
	 *
	 * 
	 */


	private function stop_words( $length )

	{
		$length = ($length > 0) ? $length:1;

		$pattern = "/(\b\w{1,".$length."}\b)|[^\w\s.]|(?<!\.)\.(?!\.)|(?<=\s)\.(?!\s)/";

		return preg_replace([$pattern, '/\s+/'], ['', ' '], $this->primary_manuscript);

	}






	private function format_chunks( $array_chunks )

	{

		$chunks = array();


		foreach( $array_chunks as $key => $syllables)

		{

			$chunks[] = trim( preg_replace('/\s+/', ' ', implode(" ", $syllables)) );

		}

		return $chunks;

	}



}



