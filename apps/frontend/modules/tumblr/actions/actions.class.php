<?php

/**
 * tumblr actions.
 *
 * @package    cosplay
 * @subpackage tumblr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class tumblrActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    // public function executeIndex()
    // {

    // }

    //アップロードをする。
    public function executeUpload()
    {
        //GETの場合
        if($this->getRequest()->getMethod() == sfRequest::GET)
        {


            return sfView::SUCCESS;
        }
        else
        {
            var_dump("aaa");






        }


    }






}
