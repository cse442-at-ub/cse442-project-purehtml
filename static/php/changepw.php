<html>
<?php
// Start the session
session_start();
?>
<?php
$path = '../data/log.txt';
$user = $_POST['username'];
$password = $_POST['password'];
$newpassword = $_POST['newpassword'];

$content=file_get_contents($path);
//print var_dump($content);
$content_chunks=explode($password, $content);
//print var_dump($content_chunks);
$content=implode($newpassword, $content_chunks);
//print var_dump($content);
file_put_contents($path, $content);

echo "<script>alert('Password changed successfully!');</script>";
echo "<script>location.href = '../userpage.php'</script>";

?>

</html>