<?php
if (isset($_POST['submit'])) {

    $writeComment = implode('', file('test.txt')) . '[!@X#$]'. $_POST['data'];
    $myfile = fopen("test.txt", "w") or die("Unable to open file!");

    fwrite($myfile, rtrim($writeComment, '[!@X#$]'));
    fclose($myfile);
}

$fileContent = implode('', file('test.txt'));
$comments = explode('[!@X#$]', rtrim($fileContent, '[!@X#$]'));

?>