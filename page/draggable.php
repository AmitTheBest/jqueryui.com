<?php

class page_draggable extends Page {
    function init(){
        parent::init();
        $form = $this->add('Form');
        $form->addField('Line','name');
        $form->addSubmit();
    }
}
