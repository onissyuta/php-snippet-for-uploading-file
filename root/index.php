<?php
$upDir = __DIR__.'/upload/';

if(isset($_FILES['image'])){
    echo '<p>元のファイル名：'.$_FILES['image']['name'].'</p>';
	echo '<p>一時ファイル名：'.$_FILES['image']['tmp_name'].'</p>';
	echo '<p>ファイルサイズ：'.$_FILES['image']['size'].'byte</p>';

    move_uploaded_file($_FILES['image']['tmp_name'], $upDir.$_FILES['image']['name']);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルアップローダー</title>
</head>
<body>
    <h1>ファイルアップローダー</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit">アップロード</button>
    </form>
    <hr>
    <ul>
    <?php foreach(scandir($upDir) as $file): ?>
		<li><a href="./upload/<?= $file ?>"><?= $file ?></a></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>