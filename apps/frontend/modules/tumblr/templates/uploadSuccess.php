
<h1>アップロード画面</h1>




<?php echo form_tag('@tumblr_upload',array('id'=>'form','enctype' => 'multipart/form-data')) ?>

    <?php echo input_hidden_tag('id',"hogehoge") ?>
    <?php echo input_hidden_tag('profile_url',"profile_url") ?>

    <p>TwitterIDは載せますか？</p>
    <?php echo checkbox_tag('id_check', 1, true) ?>

    <p>画像アップロード</p>
    <p><?php echo input_file_tag("image_path"); ?></p>


    <br>

    <?php echo submit_tag("アップロードする") ?>

</form>








