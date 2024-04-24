<!doctype html>
<html lang="nl">

<head>
    <title>Prikbord</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>
    
    <div class="container home">

        <p>Berichten:</p>

        <?php
        require_once 'backend/conn.php';
        $query = "SELECT * FROM berichten";
        $statement = $conn->prepare($query);
        $statement->execute();
        $berichten = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
            </tr>
            <?php foreach ($berichten as $bericht): ?>
                <tr>
                    <td><?php echo $bericht['title']; ?></td>
                    <td><?php echo $bericht['content']; ?></td>
                    <td><?php echo $bericht['author']; ?></td>
                    <td><a href="berichten/edit.php?id=<?php echo $bericht['id'] ?>">Berichttitel</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

</body>

</html>
