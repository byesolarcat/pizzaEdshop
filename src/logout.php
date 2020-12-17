<?php
    setcookie('userid',$user['id'],time()-3600,"/");
    setcookie('useremail',$user['email'],time()-3600,"/");
    setcookie('username',$user['name'],time()-3600,"/");
    setcookie('usersurname',$user['surname'],time()-3600,"/");
    setcookie('isadmin',$user['isAdmin'],time()-3600,"/");
    header('Location: /');
 ?>