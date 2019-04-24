<?php

namespace rafapaulino\Slugify;

use Ausi\SlugGenerator\SlugGenerator;

class Slugify
{
    public function getUrlSlug($title)
    {
        $title = trim($title);

        if ($title !== "") {
            $generator = new SlugGenerator;
            return $generator->generate($title);
        }
        return 'empty-title-' . time();
    }

    public function getFileSlug($fileName)
    {
        $fileName = trim($fileName);
        $ext = explode(".", $fileName);

        if ($fileName !== "" && count($ext) > 0) {
            
            $ext = $ext[count($ext)-1];
            //remove extension in file name
            $str = str_replace(".".$ext, "", $fileName);
            
            $generator = new SlugGenerator;
            $str = $generator->generate($str);
    
            return strtolower($str . '.' . $ext);
        }

        return 'empty-file-name-' . time() . '.undefined';
    }
}