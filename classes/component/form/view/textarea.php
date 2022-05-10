<?echo View::get_instance()->param["form_name"]?><br>
<?if(View::get_instance()->param["form_required"] == "Y"){?>
    <textarea name="" id="" cols="30" rows="10"></textarea>
<?}else{?>
    <textarea name="" id="" cols="30" rows="10" required></textarea>
<?}?>
<br>
<br>