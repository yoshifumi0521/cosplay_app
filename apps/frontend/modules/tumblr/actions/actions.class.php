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

            $this->custom = Spyc::YAMLLoad(SF_ROOT_DIR.'/config/custom.yml');



            $base_hostname = $this->custom['core']['base_hostname'];
            $consumer_key = $this->custom['core']['consumer_key'];
            $consumer_secret = $this->custom['core']['consumer_secret'];
            $oauth_token = $this->custom['core']['oauth_token'];
            $oauth_token_secret = $this->custom['core']['oauth_token_secret'];

            $http_request = new HTTP_Request2();
            $http_request->setConfig('ssl_verify_peer', false);

            $consumer = new HTTP_OAuth_Consumer($consumer_key, $consumer_secret);
            $consumer_request = new HTTP_OAuth_Consumer_Request;
            $consumer_request->accept($http_request);
            $consumer->accept($consumer_request);

            $consumer->setToken($oauth_token);
            $consumer->setTokenSecret($oauth_token_secret);

            //画像を保存する。
            $fileName = $this->getRequest()->getFileName('image');

            // $thumbnail = new sfThumbnail(150, 150);
            // $thumbnail->loadFile($this->getRequest()->getFilePath('image'));
            // $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnail/'.$fileName, 'image/png');

            // $this->getRequest()->moveFile('thumbnail', sfConfig::get('sf_upload_dir').'/'.$fileName);

            $image = new sfThumbnail(800,600);
            $image->loadFile($this->getRequest()->getFilePath('image'));
            $image->save(sfConfig::get('sf_upload_dir').'/thumbnail/'.$fileName, 'image/jpeg');

            // var_dump(base64_encode(file_get_contents('/uploads/thumbnail/tumblr_n6p6c0s0Uy1tdgnn9o1_1280%202.jpg')));
            // die();


            if($this->getRequestParameter('id_check') == 1)
            {
                $caption = '<a href="'.$this->getRequestParameter('profile_url').'" target="_blank">'.$this->getRequestParameter('id').'</a>';
            }
            else
            {
                $caption = "";
            }

            $tags = $this->getRequestParameter('area').",".$this->getRequestParameter('tag');

            //photoの投稿
            $params = array(
                'type' => 'photo',
                'caption' => $caption,
                'tags' => $tags,
                //画像のリンクがある場合
                // 'source' => base64_encode(file_get_contents('/uploads/thumbnail/tumblr_n6p6c0s0Uy1tdgnn9o1_1280%202.jpg')),
                // 'source' => $this->custom['core']['domain'].'uploads/thumbnail/tumblr_n6p6c0s0Uy1tdgnn9o1_1280%202.jpg',
                'source' => 'http://www.omnioo.com/record/wp-content/uploads/kuroki-889x500.jpg',
            );


            $api_url = 'http://api.tumblr.com/v2/blog/cosplay-test.tumblr.com/post';
            $response = $consumer->sendRequest($api_url, $params);

            $r = array();
            $r["Status"] = 1;

            //jsonを出力
            echo json_encode($r);
            die();




        }

    }
}
