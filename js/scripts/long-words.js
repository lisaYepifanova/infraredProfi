/*
function findLongestWord(str) {
  var longestWord = str.split(' ').sort(function(a, b) { return b.length - a.length; });
  return longestWord[0].length;
}

$lWord = findLongestWord("The quick brown fox jumped over the lazy dog");

function onTextChange($fsize, $len) {
    var textLength = $($lWord).text().length;
    var fontSize = Math.min($fsize, ($len / textLength) * $fsize);
    $($lWord).css('font-size', fontSize + 'px');
}

onTextChange(12, 1000);
    */