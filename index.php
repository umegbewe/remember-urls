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
    <title>Shorten.me</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header> 
        <h1>Shorten.me</h1>
    </header>
    <main>
        <section class="form">
            <form action="post.php" method="post">
                <input type="text" name="long_url" id="long_url" placeholder="https://google.com" />
                <input type="submit" value="Shorten.me" />
            </form>
        </section>
        <section class="urls">
            <?php foreach ($urls as $url) : ?>
            <div class="url">
                <div class="id">
                    <?= $url['ID']; ?>
                </div>
                <div class="short_url">
                   <a href="https://localhost/r?c=<?= $url['ID']; ?>" target="_blank"> 
                        https://localhost/r?c=<? $url['ID']; ?>
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