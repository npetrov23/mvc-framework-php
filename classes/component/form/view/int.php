<?echo View::get_instance()->param["form_name"]?><br>
<?if(View::get_instance()->param["form_required"] == "Y"){?>
<input type="number">
<?}else{?>
<input type="number" required>
<?}?>
<br>
<br>