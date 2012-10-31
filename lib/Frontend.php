<?php

class Frontend extends ApiFrontend {
    function init(){
        parent::init();

        $this->add('jUI');


        $m=$this->add('Menu',null,'Menu','Menu');
        $m->addMenuItem('draggable');
        $m->addMenuItem('droppable');
        $m->addMenuItem('resizeable');
        $m->addMenuItem('selectable');
        $m->addMenuItem('sortable');
    }

}
