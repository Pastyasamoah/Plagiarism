<?php 


require_once "Reference.php";

require_once "Highlight.php";




$Article = "2.2 Healthcare Supply Chain Actors Defined
This section defines healthcare supply chain actors and discusses the different actors in terms of their relationship and influences on the HSC. 
2.2.1 Overview Supply Chain Actors
The activities and processes involved in the creation of health resources and services and the successful transportation to the final consumer are carried out by parties who directly or indirectly have influences on the HSC. Studies have identified these parties to include the producers, distributors, consumers, government, financial institutions and information technology service providers and are generally referred to as the HSC actors (Mathur et al., 2018; Khalid and Seuring, 2019). Each of these actors play a role to affect the operationalization of the HSC. Contemporary studies have defined and discussed SC actors in terms of the relationships and nature of influences they have on the HSC; direct and indirect influences (Marques, Martins and Araújo, 2020; Sloane and O’reilly, 2012). Authors have defined HSC actors with a direct influence (actor who are part of the SC) on the HSC to be ‘traditional supply chain actors’ (Marques, Martins and Araújo, 2020; Mathur et al., 2018) while actors who indirectly influence (actors who are not part of the supply chain) the HSC are described as ‘non-traditional supply chain actors’ (Windel, 2020).
2.2.2 Traditional Supply Chain Actors
As defined above, the traditional SC actors are the parties involved in the traditional vertical buyer-seller relationship (Mathur et al., 2018). The traditional SC actors involve the producers, suppliers, distributors and customers or consumers. In the healthcare setting, such actors may be viewed as the manufacturers, importers, the hospital, warehouse, distributors and patients. They play active role in the HSC which contribute to the successes and failures in the SC activities (Marques, Martins and Araújo, 2020). 
2.2.3 Non-Traditional Supply Chain Actors
The non-traditional supply chain actors are the actors who do not form part of the traditional healthcare supply chain however, their operations affect the HSC (Hopp et al., 2019). They include the health insurance service providers, regulators and IT services providers (Marques, Martins and Araújo, 2020). These actors contribute to the successes and failures in the HSC. Studies have adopted different terminologies to refer to these HSC actors. Some authors have referred to these actors as “non-supply chain actors” (Yaroson et al., 2019; Yan, 2017) and “non-traditional supply chain actors” (Marques, Martins and Araújo, 2020; Windel, 2020). In this study, these actors will be referred to as “non-traditional supply chain actors” as it is descriptive enough and has been used more frequently in contemporary studies.
";



$Reference = new Reference($Article);

$Citations = $Reference->Citations();

$Article = $Reference->Article();


$Highlight = new Highlight( $Article );


foreach( $Citations as $Citation )

{

	$Highlight->text( $Citation )->in()->article();


}


$result = $Highlight->result();


print_r($result);

