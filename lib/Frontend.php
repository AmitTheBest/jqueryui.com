<?php

class Frontend extends ApiFrontend {
    function init(){
        parent::init();

        $this->add('jUI');

        $m=$this->add('Menu',array("current_menu_class" => "active"), 'Menu','Menu');
        $m->addMenuItem('draggable');
        $m->addMenuItem('droppable');
        $m->addMenuItem('resizeable');
        $m->addMenuItem('selectable');
        $m->addMenuItem('sortable');

        $this->add('Menu_Light',null,'TopMenu','TopMenu');
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
