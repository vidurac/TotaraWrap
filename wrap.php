<?php
/**
 * Function wrap
 *
 * @param $longString - string to be wrap
 * @param $maxLineLength (INT)
 * @return string
 */
function wrap($longString, $maxLineLength)
{
    $arrayWords = explode(' ', $longString);

    $currentLength = 0;
    $index = 0;
    $output = array();
    $returnStr = "";

    foreach ($arrayWords as $word) {
        // +1 because the word will receive back the space in the end that it loses in explode()
        $wordLength = strlen($word);

        if ($wordLength > $maxLineLength) {
            $tempChar = str_split($word, $maxLineLength);

            foreach ($tempChar as $valTempChar) {

                if ($index === 0) {
                    @$output[$index] .= $valTempChar;
                    $index += 1;
                } else {
                    $index += 1;
                    @$output[$index] .= $valTempChar;
                }

            }

            $currentLength += $wordLength;
        } else {

            if (($currentLength + $wordLength) <= $maxLineLength) {

                if (($currentLength + $wordLength) < $maxLineLength) {

                    $output[$index] .= $word . ' ';
                    $wordLength += 1;

                } else {
                    $output[$index] .= $word;
                }

                $currentLength += $wordLength;
            } else {
                $index += 1;

                $currentLength = $wordLength + 1;
                $output[$index] = $word . ' ';
            }

        }

    }

    //format $output with line break
    foreach ($output as $valWrapWord) {
        $returnStr .= trim($valWrapWord) . "\n";
    }

    return $returnStr;

}

$str = "test test";
//$str = "test test moretest is a anoher test heres";
$len = 3;


$returnString = wrap($str, $len);
echo $returnString;
