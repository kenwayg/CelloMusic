<?php require_once "../config/dbh.php";

$lang = $_POST['lanId'];
$sql_grab = mysqli_query($conn,"SELECT * FROM language WHERE lang_id='$lang'");
$total_result = mysqli_fetch_assoc($sql_grab);
echo '<hr>
<form action="" id="update_lang_form">
<label for="lang">Update Language</label>
<input type="text"  name="update_lang" id="update_language" value="'.$total_result['lang'].'" class="form-control" placeholder="Enter the language"><br>
<input type="hidden"  name="update_id" id="up_language" value="'.$total_result['lang_id'].'" class="form-control" placeholder="Enter the language"><br>
</form>
<button type="submit" id="update_lang_btn" class="love">Update</button>
<button class="btn btn-secondary cancel" id="cancel">Cancel</button>';
?>

<script>
    $(document).ready(function () {
        $("#update_lang_btn").on("click",function(){
            var language = $("#update_language").val();
            var language_id = $("#up_language").val();
    $.ajax({
        type:"POST",
        url:"web_services/updateLanguage.php",
        data:{main_lan:language, main_id:language_id},
        success:function(result){
            alert(result);
        }
    });
})

    })
</script>