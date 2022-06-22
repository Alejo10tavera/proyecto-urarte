

<?php 

if(isset($urlParams[1])){ 

	if($urlParams[1] == "enrollment" || 
       $urlParams[1] == "login" ||
       $urlParams[1] == "profile" ||
       $urlParams[1] == "logout"){

        include $urlParams[1]."/".$urlParams[1].".php";

    }else{

        echo '<script>

            window.location = "'.$path.'";

        </script>'; 
   }

}else{

    echo '<script>

        window.location = "'.$path.'";

    </script>'; 

}

?>