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


            include 'HTTP/OAuth/Consumer.php';

            $base_hostname = 'cosplay-test.tumblr.com';
            $consumer_key = 'mLZUpz2KlovuU2UqJAMcvGKh9cGlBOK4VXWlwVSePxlAsZbmng';
            $consumer_secret = 'B4TsOcgFBxbWIQZ27SjCRjHzO3AS2S05chFg9nParwQdx1LdEq';
            $oauth_token = 'lxpPpfMTy4pIrKWwhCXG8UyUlRrtryH2J79cRz7T4E0gAsilDQ';
            $oauth_token_secret = 'hEuumFYJ9xObyvQHYXxzixs4QubQqJh085OjLCTxKRY8LLagKc';

            $http_request = new HTTP_Request2();
            $http_request->setConfig('ssl_verify_peer', false);

            $consumer = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
            $consumer_request = new HTTP_OAuth_Consumer_Request;
            $consumer_request->accept($http_request);
            $consumer->accept($consumer_request);

            $consumer->setToken($oauth_token);
            $consumer->setTokenSecret($oauth_token_secret);

            //photoの投稿
            $params = array(
                'type' => 'photo',
                'caption' => 'キャプション',
                //画像のリンクがある場合
                'source' => 'http://www.omnioo.com/record/wp-content/uploads/kuroki-889x500.jpg',
            );


            $api_url = 'http://api.tumblr.com/v2/blog/cosplay-test.tumblr.com/post';
            $response = $consumer->sendRequest($api_url, $params);
            var_dump($response);






        }

    }
}
