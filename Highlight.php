<?php 



class Highlight

{

	


	private $article = null;


	private $highighted_phrase = null;


	private $phrase = null;



	public function __construct($article)

	{

		
		$this->article = "<p style='font-size:18px'>".$article."</p>";


	}



	public function text( $phrase )


	{

		$this->highighted_phrase = "<b style='background-color:yellow'> $phrase </b>";

		$this->phrase = $phrase;

		return $this;

	}



	
	public function in()


	{


		return $this;


	}




	public function article()

	{


		if( $this->highighted_phrase != null )

		{

			$replace = $this->phrase;

			$this->article = str_replace($replace, $this->highighted_phrase, $this->article);

		}
		else
		{
			
			die("$Highlight->text(val)->in()->article()");

		}


	}



	public function result()


	{


		return $this->article;


	}






}


