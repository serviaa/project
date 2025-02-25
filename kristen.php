<?php
    error: function(xhr, status, error) {
        console.log("Error: " + error);}
// Fungsi untuk mendapatkan teks Alkitab berdasarkan kitab dan pasal dari respons XML
function getBibleVerses($xml, $book, $chapter) {
    $verses = '';

    // Mengambil elemen 'verses' dari XML
    $verseElements = $xml->xpath("//book[@name='$book']/chapter[chap='$chapter']/verses/verse");

    // Mengambil teks Alkitab dari setiap elemen 'verse'
    foreach ($verseElements as $verse) {
        $number = (string)$verse->number;
        $text = (string)$verse->text;
        $verses .= "Ayat $number: $text<br>";
    }

    return $verses;
}

// Mendapatkan nilai 'book' (kitab) dan 'chapter' (pasal) dari parameter GET
$book = isset($_GET['book']) ? $_GET['book'] : 'Kejadian';
$chapter = isset($_GET['chapter']) ? $_GET['chapter'] : '1';

// Mengambil respons XML dari API Sabda
$xmlString = file_get_contents("https://alkitab.sabda.org/api/passage.php?passage=$book+$chapter&type=xml");

// Mengubah respons XML menjadi objek SimpleXML
$xml = simplexml_load_string($xmlString);

// Mendapatkan teks Alkitab dari respons XML
$verses = getBibleVerses($xml, $book, $chapter);

// Menampilkan teks Alkitab
echo $verses;
?>