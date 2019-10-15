<?php
if ($_POST['submit'] != 'OK')
{
    echo "ERROR\n";
}
else
{
    $username = $_POST['login'];
    $oldpassword = $_POST['oldpw'];
    $newpassword = $_POST['newpw'];
    $oldpassword = hash("sha1",$oldpassword);
    $account = Array('user'=>$username, 'pass'=>$password);
    
    if(!file_exists('../ex01/private'))
        echo "ERROR\n";
    if(file_exists('../ex01/private/passwd'))
    {
        $accounts = file_get_contents('../ex01/private/passwd');
        $accounts = unserialize($accounts);
        $exist = false;
        $i = 0;
        
        foreach($accounts as $acc)
        {
            $i++;
            if ($acc['user'] == $username && $acc['pass'] == $oldpassword)
            {
                $exist = true;
                if ($newpassword == '')
                    echo "ERROR\n";
                else
                {
                   $newpassword = hash("sha1",$newpassword);
                    $acc['pass'] = $newpassword;
                    echo "OK\n";
                }
                break;
            }
        }
        if (!$exist)
            echo "ERROR\n";
        else
        {
            $accounts[$i-1]['pass'] = $newpassword;
        }
        $data = serialize($accounts);
        file_put_contents('../ex01/private/passwd', $data);
    }
    else
    {
        echo "ERROR\n";
    }
}
?>
