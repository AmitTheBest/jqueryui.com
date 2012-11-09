<?php

class Frontend extends ApiFrontend {
    function init(){
        parent::init();

        $this->add('jUI');

        $m=$this->add('Menu',array("current_menu_class" => "active"), 'Menu','Menu');
        $m->addMenuItem('draggable');
        $m->addMenuItem('droppable');
        $m->addMenuItem('resizable');
        $m->addMenuItem('selectable');
        $m->addMenuItem('sortable');

        $this->add('Menu_Light',null,'TopMenu','TopMenu');
        /*
        $r = $this->add("misc/Controller_PatternRouter");
        $r->addRule("\/demo\/([a-zA-Z-]+)\/([a-zA-Z+0-9-]+).html", "demo/launch", array("type", "example"))
            ->route();
         */
    }

    function initLayout(){

        list($first,$rest)=preg_split('/[_\/]/',$this->page);

        if(in_array($first, 
            array('draggable','droppable',
            'resizable','selectable','sortable'))){
            $p=$this->add('Page_Demo');
        }else return parent::initLayout();
    }

    function addDefaultLocations(){
		if(!$base_directory)$base_directory=realpath($GLOBALS['argv'][0]);
        $this->addLocation('/',array(
                'template'=>'external/jqueryui.com/',
            )
        )->setBasePath($base_directory);
//->setParent($this->pathfinder->base_location);
    }
}
