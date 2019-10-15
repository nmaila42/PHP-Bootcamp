<?php
if ($_POST['submit'] != 'OK')
{
    echo "ERROR\n";
}
else
{
    $username = $_POST['login'];
    $password = $_POST['passwd'];
    $password = hash("sha1",$password);
    $account = Array('user'=>$username, 'pass'=>$password);

    if(!file_exists('private'))
        mkdir("private");
    if(file_exists('private/passwd'))
    {
        $tmp = file_get_contents('private/passwd');
        $accounts = unserialize($tmp);
        $exist = false;

        foreach($accounts as $acc)
        {
            if ($acc['user'] == $username && $acc['pass'] == $password)
            {
                $exist = true;
                echo "ERROR<br>";
                break;
            }
        }
        if (!$exist)
            $accounts[] = $account;
           // echo "OK\n";
    }
    else
    {
        $accounts = Array();
        $accounts[] = $account;
        echo "OK\n";
    }
    $data = serialize($accounts);
    file_put_contents('private/passwd', $data);
}
?>