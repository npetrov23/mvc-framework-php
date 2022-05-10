<?echo View::get_instance()->param["form_label"]?><br>
<?$form_name = View::get_instance()->param["form_name"]?>
<?if(View::get_instance()->param["form_required"] == "Y"){?>
<input type="number" name="<?echo $form_name?>">
<?}else{?>
<input type="number" name="<?echo $form_name?>" required>
<?}?>
<br>
<br>