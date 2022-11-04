<?php

abstract class AbstractController{
    protected $view;
    protected $model;

    /** 
     * Sets the model
     */
     abstract protected function makeModel(): Model;

     /** 
     * Sets the view
     */
     abstract protected function makeView(): View;

     /** 
     * responsible for connecting everything
     */
     abstract public function start();
}