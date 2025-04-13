<!DOCTYPE html>
<html>
    <head>
        <title>Formularz</title>
    </head>
    <body>
    <form method="post">
        <label for="name">Imię:</label><br/>
        <input type="text" name="name" id="name" required><br/><br/>

        <label for="email">Adres e-mail:</label><br/>
        <input type="email" name="email" id="email" required><br/><br/>

        <label for="phone">Numer telefonu:</label><br/>
        <input type="tel" name="phone" id="phone"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required><br/><br/>

        <label for="notes">Notatki:</label><br/>
        <textarea name="notes" id="notes"required></textarea><br/><br/>

        <input type="submit" value="Wyślij">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = strip_tags($_POST["name"]);
        $email = strip_tags($_POST["email"]);
        $phone = strip_tags($_POST["phone"]);
        $notes = strip_tags($_POST["notes"]);

        $entry = "Imię: $name\nAdres e-mail: $email\nNumer telefonu: $phone\nNotatki: $notes\n\n";

        file_put_contents("data.txt", $entry, FILE_APPEND | LOCK_EX);
    }
    ?>

    </body>
</html>
