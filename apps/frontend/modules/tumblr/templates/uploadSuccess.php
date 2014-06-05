
<h1>アップロード画面</h1>




<?php echo form_tag('@tumblr_upload',array('id'=>'form','enctype' => 'multipart/form-data')) ?>


    <p>画像アップロード</p>
    <p><?php echo input_file_tag("image"); ?></p>


    <br>

    <?php echo submit_tag("アップロードする") ?>

</form>








