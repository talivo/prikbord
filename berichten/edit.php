<!doctype html>
<html lang="nl">
<head>
    <title>Prikbord / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>
<body>
    <?php require_once '../header.php'; ?>
    <div class="container">
        <h1>Aanpassen bericht</h1>
        <?php
        $id = $_GET['id'];
        require_once '../backend/conn.php';
        $query = "SELECT * FROM berichten WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([":id" => $id]);
        $bericht = $statement->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="../backend/berichtenController.php" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-input" value="<?php echo $bericht['title']; ?>">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-input" rows="4"><?php echo $bericht['content']; ?></textarea>
            </div>
            <input type="submit" value="Melding opslaan">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="action" value="edit">
        </form>
    </div>  
</body>
</html>
