<?php
    include 'db.php';

    $db = new Database("localhost", "shortened", "root", "");
    $db = $db->connect();

    $stmt = $db->query("SELECT * FROM urls");
    $urls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Remember Urls</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header> 
        <a href=""><h1>Remember Urls</h1></a>
    </header>
    <main>
        <section class="form">
            <form action="post.php" method="POST">
                <input type="text" name="long_url" id="long_url" placeholder="https://google.com" />
                <input type="submit" value="remember.me" />
            </form>
        </section>
        <section class="urls">
            <?php foreach ($urls as $url) : ?>
            <div class="url">
                <div class="id">
                    <?= $url['ID']; ?>
                </div>
                <div class="short_url">
                        <label>Saved</label>
                   </a>
                </div>
                <div class="long_url">
                    <a href="<?= $url['long_url']; ?>" target="_blank"><?= $url['long_url']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>
