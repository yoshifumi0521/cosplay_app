
<h1>アップロード画面</h1>




<?php echo form_tag('@tumblr_upload',array('id'=>'form','enctype' => 'multipart/form-data')) ?>

    <?php echo input_hidden_tag('id',"hogehoge") ?>
    <?php echo input_hidden_tag('profile_url',"https://www.google.co.jp/") ?>
    <br>

    <p>TwitterIDは載せますか？</p>
    <?php echo checkbox_tag('id_check', 1, true) ?>

    <br><br>

    <p>画像アップロード</p>
    <p><?php echo input_file_tag("image"); ?></p>

    <br>

    <p>エリア</p>
    <?php echo select_tag('area', options_for_select(array(
        'エリアA'  => 'エリアA',
        'エリアB'  => 'エリアB',
        'エリアC'    => 'エリアC',
    ), 'エリアA')) ?>

    <p>タグ</p>
    <?php echo input_tag('tag') ?>


    <br><br>

    <?php echo submit_tag("アップロードする") ?>

</form>








