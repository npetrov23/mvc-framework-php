<?echo View::get_instance()->param["form_name"]?><br>
<?if(View::get_instance()->param["form_required"] == "Y"){?>
<input type="text">
<?}else{?>
<input type="text" required>
<?}?>
<br>
<br>