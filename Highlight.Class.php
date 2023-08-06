<?php 



class Highlighter

{

	

	private $manuscript = null;


	private $syllables = [];


	private $syllable = null;


	private $hypothesis_highlight = null;


	private $highighted_syllables = [];


	private $color = null;




	public function __construct( string $manuscript, Array $syllables, string $color="yellow")

	{

		$this->manuscript = $manuscript;

		$this->color = $color;

		$this->syllables = $syllables;

		$this->initiate_highlights();

	}



	public function output()

	{

		return str_replace("xyz",'', $this->manuscript);

	}



	public function statistics()

	{

		return [
			"highlighted_chunks" => count($this->highighted_syllables)
		];

	}



	private function initiate_highlights()

	{
		
		foreach( $this->syllables as $syllable ) 

		{

			$this->syllable( $syllable )->highlight();

		}

		return $this;

	}



	private function syllable( $syllable )

	{

		$this->hypothesis_highlight = "<b style=background:{$this->color}>". $syllable ."</b>";

		$this->syllable = $syllable;

		return $this;

	}




	private function highlight()

	{


		if ( stripos( $this->manuscript , $this->syllable ) !== false )

		{

			$this->manuscript = str_replace($this->syllable, $this->hypothesis_highlight, $this->manuscript, $x);

			$this->highighted_syllables[] = $this->syllable;

		}


	}



}




