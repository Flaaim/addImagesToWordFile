<?php

require_once __DIR__ . "/vendor/autoload.php";





$phpWord = new \PhpOffice\PhpWord\PhpWord();

$template = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__."/asset/template.docx");
$pathOfImage = __DIR__."/asset/img";
$arrayOfImages = [];
foreach(new DirectoryIterator($pathOfImage) as $file){
    if($file->isFile()){
        $arrayOfImages[] = $file->getFilename();
    }
}


$template->cloneRow('company-logo:600:450', count($arrayOfImages));
    $number = 1;
foreach($arrayOfImages as $image){
    $template->setImageValue('company-logo#'.$number.":600:450", array('path' => __DIR__."/asset/img/".$image));
    $number++;
}

$pathToSave = __DIR__."/asset/example.docx";
$template->saveAs($pathToSave);
