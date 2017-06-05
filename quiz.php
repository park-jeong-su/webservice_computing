<?php
$doc = new DomDocument('1.0', 'UTF-8');
$quiz = $doc->createElement('quiz');
$doc->appendChild($quiz);

$question = $doc->createElement('question', '대한민국의 초대 대통령은?');
$answer = $doc->createElement('answer', '이승만');
$url = $doc->createElement('url', 'http://jmnote.com/wiki/PHP로_XML_생성');
$quiz->appendChild($question);
$quiz->appendChild($answer);
$quiz->appendChild($url);

$xml = $doc->saveXML();
header('Content-type: text/xml');
echo $xml;
?>