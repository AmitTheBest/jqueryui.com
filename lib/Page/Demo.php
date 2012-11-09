<?php

class Page_Demo extends Page {
    function init(){
        parent::init();
        $this->api->template->del("Banner");
        list($first,$rest)=preg_split('/[\/_]/',$this->api->page);
        /* 1. let's the list of demos */
        $m = $this->api->add("Menu", null, "DevLinksContent", array("menu"));
        $file = "external/jquery-ui/demos/" . $first . "/index.html";
        if (!file_exists($file)){
            $this->add("View_Error")->set($file . " does not exist?");
            return;
        }
        $f = file_get_contents($file);
        $f = preg_replace("/([\n\r])/", "", $f);
        if (preg_match("/(<ul>.*<\/ul>)/", $f, $r)){
            if (preg_match_all("/a href=\"(.*?)\.html\"/", $r[1], $rr)){
                foreach ($rr[1] as $i){
                    if (!$rest){
                        $rest = $i;
                    }
                    $m->addMenuItem($this->api->url("/$first/" . $i), $i);
                }
            }
        }
        if ($rest){
            $f = "external/jquery-ui/demos/$first/$rest.html";
            $f = file_get_contents($f);
            $f = preg_replace("/<script src.*?script>/", "", $f);
            $this->add("View")->setHTML($f)->addClass("demo-content");
        }
    }
}
