
<?php 

class Reference

{

	
	private $String = null;

	private $Text = null;

	private $CitationsArray = array();

	private $PrimaryCitations = array();

	private $EffectiveCitations = array();


	
	public function __construct($String)

	{

		$this->String = $String;
		$this->CleanInput()->FirstCitation()->SecondCitation()->ThirdCitation()->BracketsCitation();
		return $this;

	}


	private function CleanInput()

	{
		$this->String = preg_replace('/[^\00-\255]+/u','xyz', $this->String);
		$this->String = preg_replace('/[\'\"]/','', $this->String);
		$Result = preg_match_all("/.+/", $this->String, $Matches);
		$this->Text = implode(" ", $Matches[0]);
		return $this;

	}


	private function FirstCitation()

	{

		preg_match_all("&[a-zA-Z\d_-]+[,]?\s?[(]{1}\s?\d{4}[a-zA-Z0-9\,\-.\s]+[)]{1}&", $this->Text, $Match);
		preg_match_all("&[a-zA-Z\d_-]+[,]?\s?[(]{1}\s?\d{4}\s?[)]{1}&", $this->Text, $MatchPlus);
		$this->CitationsArray["FirstCitation"] = array_unique( array_merge($Match[0], $MatchPlus[0]) );
		return $this;

	}


	private function SecondCitation()

	{

		preg_match_all("&[a-zA-Z\d_-]+[,]?\s?[(]{1}\d{4}[a-zA-Z]?[)]{1}&", $this->Text, $Match);
		$this->CitationsArray["SecondCitation"] = array_unique($Match[0]);
		return $this;

	}


	private function ThirdCitation()

	{

		preg_match_all("&[a-zA-Z\d_-]+\s{1}[a-zA-Z]{2}\s{1}[a-zA-Z]{2}[.]?[,]?\s?[(]{1}[a-zA-Z0-9,.\s]+[)]{1}&", $this->Text, $Match);
		$this->CitationsArray["ThirdCitation"] = array_unique($Match[0]);
		return $this;

	}


	private function BracketsCitation()

	{

		preg_match_all("&[(]{1}[a-zA-Z-\s\.]+\W+[a-zA-Z0-9\s.,;:/]+[)]{1}&", $this->Text, $Match);
		preg_match_all("&[(]{1}[a-zA-Z-\s\.]+[,]?\W+[a-zA-Z0-9\s.,;:\&]+[)]{1}&", $this->Text, $MatchPlus);
		$this->CitationsArray["BracketsCitation"] = array_unique( array_merge($Match[0], $MatchPlus[0]) );
		return $this;

	}

	

	private function CleanPrimary($Input)

	{

		if (substr_count($Input, '(') == 1 && substr_count($Input, ')') == 1)
		{

			return $Input;

		}

		elseif (substr_count($Input, '(') == 1 || substr_count($Input, ')') == 1 || (substr_count($Input, ')') == 0 && substr_count($Input, '(') == 0) )

		{

			return preg_replace("&[)(]&", "", $Input);

		}

		elseif ( substr_count($Input, '(') == 2 || substr_count($Input, ')') == 2)

		{

			$f = @(explode(')(', $Input));
			$s = @(explode(') (', $Input));
			$t = @(explode(')  (', $Input));
			$fo = @(explode(')   (', $Input));
			$fi = @(explode(')    (', $Input));
			$si = @(explode(')     (', $Input));

			if( count($f) > 1 ) { return preg_replace("&[)(]&", "", end($f));  }
			if( count($s) > 1 ) { return preg_replace("&[)(]&", "", end($s));  }
			if( count($t) > 1 ) { return preg_replace("&[)(]&", "", end($t));  }
			if( count($fo) > 1 ) { return preg_replace("&[)(]&", "", end($fo));  }
			if( count($fi) > 1 ) { return preg_replace("&[)(]&", "", end($fi));  }
			if( count($si) > 1 ) { return preg_replace("&[)(]&", "", end($si));  }
		}


	}




	private function GetPrimary()

	{
		$Primary = [];

		foreach( $this->CitationsArray as $Key =>$Value)

		{
			foreach($Value as $Key => $Citation)
			
			{

				$Explosion = explode("al", $Citation);

				preg_match_all("&[0-9]{4}&", $Citation, $Valid); // remove statements in brackets but not references

				if( $Explosion[0] != "" && count($Valid[0]) > 0){ 

					$IndividualCitationExplotion = explode(";", $Citation);

					foreach($IndividualCitationExplotion as $Key =>$Prim)

					{

						$Primary[] = $this->CleanPrimary($Prim); 

					}


				}
			}
			
		}
		
		return array_unique($Primary);
	}






	public function CitationsArray()

	{

		$Result = $this->GetPrimary();

		sort($Result);

		return $Result;

	}



	public function CitationsText()

	{

		$Result = "";

		foreach( $this->CitationsArray() as $citation )

		{

			$Result = $Result.$citation."; ";

		}

		$Result = ltrim($Result, ";");
		
		return rtrim($Result, ";");

	}







	public function Article()


	{


		return $this->String;


	}



}






