<?php
var_dump($_FILES);
if($_FILES["img"]["name"] === "") {
    echo "이미지 없음";
    exit;
}

echo $_FILES["img"]["name"];