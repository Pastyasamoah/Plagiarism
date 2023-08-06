<?php 


require_once "Reference.php";

require_once "Highlight.Class.php";

require_once "Manuscript.Class.php";



// Citation Extraction Test 1


$CitationExtractionTest1 = "The term plagiarism stems from the Latin word Plagium, meaning kidnapping a man (Masic, 2012). It literally 
means theft, taking material authored by others and presenting as someone else (Kljajic 1990). It is 
unintentionally or intentionally appropriating other people materials or passing other peoples works as your own 
(Roig, 2012). Plagiarism constitutes an ethical behaviour and is unacceptable (Elsevier, 2012). This is because 
truth and trustworthy results are the flesh and bones of scientific research (Masic, 2012). This calls for 
researchers, academicians to; uphold the highest level of trustworthiness through avoidance of misconduct by 
use of appropriate research designs and upholding ethical standards while conducting research. The use of ideas 
of other authors can be intentional or without intention. According to World Medical Association of Science and 
Communication plagiarism is defined as when six consecutive words are copied, seven to eleven words are 
overlapping of thirty letters (McCabe; Feghali, 2008; COPE & Armstrong, 1993). Plagiarism is defined as 
misappropriation of other peoples published and non published resources without providing proper 
acknowledgement or declaring them as one's personal effort (Gilbert & Denison, 2003; Gunsalus 2000).";


$Reference = new Reference($CitationExtractionTest1);

$Highlight = new Highlighter($Reference->Article(), $Reference->CitationsArray() );

// print_r($Highlight->Output()); // uncomment this line to see the output








//Citation Extraction Test 2


$CitationExtractionTest2 = "In recent years, instances of fraud, corruption, poor governance 
and the need for improved direction, control, anti-fraud and 
anti-corruption strategies have moved organisational ethics to 
the top of many boards of directors’ agendas (EthicsSA, 2014; 
Rossouw & Van Vuuren, 2010). Organisations are increasingly 
faced with ethics-related risks that could result in significant 
reputational damage and financial loss (Talbot, Perrin & Meakin, 
2014:109). The application of right and wrong principles in business circumstances (Rogojanu & Badea, 2011:25) is therefore important for 
sustainable business success as an ethical organisational culture contributes to effective 
governance and the achievement of organisational objectives (Masunda, 2013:217).";


$Reference = new Reference($CitationExtractionTest2);

$Highlight = new Highlighter($Reference->Article(), $Reference->CitationsArray() );

// print_r($Highlight->Output()); // uncomment this line to see the output




//Citation Extraction Test 3


$CitationExtractionTest3 = "Teddi Fishman, former director of the International Centre for Academic Integrity, has
proposed the following definition for plagiarism: “Plagiarism occurs when someone uses
words, ideas, or work products, attributable to another identifiable person or source,
without attributing the work to the source from which it was obtained, in a situation in
which there is a legitimate expectation of original authorship, in order to obtain some
benefit, credit, or gain which need not be monetary “(Fishman, 2009, p. 5). Plagiarism
constitutes a severe form of academic misconduct. In research, plagiarism is included
in the three “cardinal sins”, FFP—Fabrication, falsification, and plagiarism. According
to Bouter, Tijdink, Axelsen, Martinson, and ter Riet (2016), plagiarism is one of the
most frequent forms of research misconduct.";


$Reference = new Reference($CitationExtractionTest3);

$Highlight = new Highlighter($Reference->Article(), $Reference->CitationsArray() );

// print_r($Highlight->Output()); // uncomment this line to see the output



//Citation Extraction Test 4


$CitationExtractionTest4 = "Multinational enterprise (MNE) research has long considered nonmarket strategy to be an important determinant of internationalization (e.g., Funk & Hirschman, 2017; Zhao & Lu, 2016) and
performance (e.g., Amore & Corina, 2021; Boddewyn & Doh, 2011;
Sun, Doh, Rajwani, & Siegel, 2021). An MNE’s non-market strategy
is its ‘‘concerted pattern of actions to improve its performance by
managing the institutional or societal context of economic competition’’ (Mellahi, Frynas, Sun, & Siegel, 2016: 144). The construct
takes multiple forms, including corporate social activity (Husted &
Allen, 2009), corporate political activity (Mellahi et al., 2016), legal and public sensitization strategies (Baron, 1997),
and self-categorization strategies (Curchod, Patriotta, & Wright, 2020). However, Sun et al. (2021)
argue that corporate social activity (CSA) and
corporate political activity (CPA) are the two principal non-market strategies. MNEs engage in CSA
with multiple societal stakeholders to improve
social and environmental practices (Husted &
Allen, 2006; Teegen, Doh, & Vachani, 2004), and
in CPA to deal with home-country and hostcountry political actors (Boddewyn & Doh, 2011;
Cui, Hu, Li, & Meyer, 2018). Our study focuses on
the CPA of MNE subsidiaries in host countries as a
non-market strategy to navigate institutional complexity (Marquis & Raynard, 2015; Sheng, Zhou, &
Li, 2011).";


$Reference = new Reference($CitationExtractionTest4);

$Highlight = new Highlighter($Reference->Article(), $Reference->CitationsArray() );

// print_r($Highlight->Output()); // uncomment this line to see the output







//Text-matching Test 1


$OriginalTextTest1 = "The term plagiarism stems from the Latin word Plagium, meaning kidnapping a man (Masic, 2012). It literally 
means theft, taking material authored by others and presenting as someone else (Kljajic 1990)";

$FixedTest1 = "The term plagiarism means kidnapping a man. It literally means theft, taking material authored by others and presenting as someone else (Kljajic 1990)";


$Manuscript = new Manuscript( $FixedTest1 );
$Knowledge = new Manuscript( $OriginalTextTest1 );
$Chunks = $Manuscript->chunks();
$Highlight = new Highlighter( $Knowledge->processed(), $Chunks );
// print_r($Highlight->output()); // uncomment this line to see the output




//Text-matching Test 2


$OriginalTextTest2 = "In recent years, instances of fraud, corruption, poor governance and the need for improved direction, control, anti-fraud and anti-corruption strategies have moved organisational ethics to the top of many boards of directors’ agendas (EthicsSA, 2014; 
Rossouw & Van Vuuren, 2010).
";

$FixedTest2 = "In recent years, instances of fraud, corruption, poor governance and the need for improved direction, control, anti-fraud and anti-corruption strategies have moved organisational ethics to the top of many boards of directors’ agendas (EthicsSA, 2014; 
Rossouw & Van Vuuren, 2010).
";

$Manuscript = new Manuscript( $FixedTest2 );
$Knowledge = new Manuscript( $OriginalTextTest2 );
$Chunks = $Manuscript->chunks();
$Highlight = new Highlighter( $Knowledge->processed(), $Chunks );
// print_r($Highlight->output()); // uncomment this line to see the output


//Text-matching Test 3


$OriginalTextTest3 = "Plagiarism occurs when someone uses words, ideas, or work products, attributable to another identifiable person or source,
without attributing the work to the source from which it was obtained
";

$FixedTest3 = "The term plagiarism stems from the Latin word Plagium, meaning kidnapping a man (Masic, 2012). It literally means theft, taking material authored by others and presenting as someone else (Kljajic 1990)";

$Manuscript = new Manuscript( $FixedTest3 );
$Knowledge = new Manuscript( $OriginalTextTest3 );
$Chunks = $Manuscript->chunks();
$Highlight = new Highlighter( $Knowledge->processed(), $Chunks );
// print_r($Highlight->output()); // uncomment this line to see the output

