<?php require_once "../config/dbh.php";

$sql_get= mysqli_query($conn,"SELECT * from language");
$sn =1;
if (mysqli_num_rows($sql_get)>0) {
    while($result = mysqli_fetch_assoc($sql_get)){
        echo '<tr>
        <td>'.$sn++.'</td>
        <td>'.$result['lang'].'</td>
        <td><a href="javascript:void(0)" rel='.$result['lang_id'].' class="edit"><i class="far fa-edit" </i></a></td>
        <td><a href="javascript:void(0)"  rel='.$result['lang_id'].' class="trash"><i class="fas fa-trash"></i></a></td>  
        </tr>';
    
    }
  
}
else{
    echo "No data found";
}


?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").on("click",function () {
            const lang_id = $(this).attr("rel");
            alert(lang_id);
            $("#update_lang").show();
            $("#add_lang").hide();
            // $("#update_language").val("red");
          $(".yu").removeClass("lust");
          $(".yu").addClass("love");

        //   ....................................Getting languages
$.ajax({
    type:"POST",
    url:'web_services/editLanguage.php',
    data:{lanId:lang_id},
success:function (result) {
    $("#update_form").html(result);

    
}
});

        });

        // ................................eDIT LANHUAGE





        // ...........................delete language
        $(".trash").on("click",function(){
            const lang_id = $(this).attr("rel");
            alert(lang_id);
            // $("#update_language").val("red");  
$.ajax({
    type:"POST",
    url:'web_services/deleteLanguage.php',
    data:{lanId:lang_id},
success:function (result) {
   alert(result);

    
}
});


        })
     
        $("#cancel").on("click", function () {
            $("#update_lang").hide();
            $("#add_lang").show();
            $(".yu").addClass("lust");
        
        })
    })
</script>