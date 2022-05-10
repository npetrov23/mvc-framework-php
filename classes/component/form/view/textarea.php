<?echo View::get_instance()->param["form_label"]?><br>
<?$form_name = View::get_instance()->param["form_name"]?>
<?if(View::get_instance()->param["form_required"] == "Y"){?>
    <textarea name="<?echo $form_name?>" cols="30" rows="10"></textarea>
<?}else{?>
    <textarea name="<?echo $form_name?>" cols="30" rows="10" required></textarea>
<?}?>
<br>
<br>