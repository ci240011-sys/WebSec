<?php
$target_hash = "5e884898da28047151d0e56f8dc6292773603d0d"; // SHA1 of "password"

$wordlist = ["123456", "password", "12345678", "admin123", "qwerty"];

echo "Target hash: $target_hash<br>";

foreach ($wordlist as $word) {
    $hash = sha1($word);
    echo "$word → $hash<br>";
    
    if ($hash == $target_hash) {
        echo "Password is: $word";
        break;
    }
}
?>