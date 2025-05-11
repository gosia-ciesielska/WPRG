<form class="booking-form" action="#" method="post">
    <input name="reservation_data" type="hidden" value="<?php echo str_replace("\"", "'", $data->toJson()); ?>">
    <div class="guest-data">
        <h2>Gość 1</h2>
        <div class="elem-group">
            <label for="name">Imię</label>
            <input type="text" name="guest_name_0" 
            value="<?php echo getReservationData($data, "name"); ?>" readonly>
        </div>
        <div class="elem-group">
            <label for="surname">Nazwisko</label>
            <input type="text" name="guest_surname_0" 
            value="<?php echo getReservationData($data, "surname"); ?>" readonly>
        </div>
        <div class=" elem-group">
            <label for="email">Adres e-mail</label>
            <input type="email" name="guest_email_0" 
            value="<?php echo getReservationData($data, "email"); ?>" readonly>
        </div>
        <div class=" elem-group">
            <label for="phone">Numer telefonu</label>
            <input type="tel" name="guest_phone_0" 
            value="<?php echo getReservationData($data, "phone"); ?>" readonly>
        </div>
        <hr>
    </div>
    </div>
    <?php
    for ($i = 1; $i < $data->guestCount; $i++) {
        ?>
        <div class="guest-data">
            <h2>Gość <?php echo $i + 1; ?></h2>
            <div class="elem-group">
                <label for="guest_name_<?php echo $i; ?>">Imię</label>
                <input type="text" name="guest_name_<?php echo $i; ?>" placeholder="Jan"
                    value="<?php echo getGuestData($guests, $i, "name"); ?>" required>
                <?php
                if (!empty($guests[$i]->name) && !$guests[$i]->isNameValid()) {
                    echo "<label class=\"error\" for=\"guest_name_$i\">Błędne imię</label>";
                }
                ?>
            </div>
            <div class="elem-group">
                <label for="guest_surname_<?php echo $i; ?>">Nazwisko</label>
                <input type="text" name="guest_surname_<?php echo $i; ?>" placeholder="Kowalski"
                    value="<?php echo getGuestData($guests, $i, "surname"); ?>" required>
                <?php
                if (!empty($guests[$i]->surname) && !$guests[$i]->isSurnameValid()) {
                    echo "<label class=\"error\" for=\"guest_surname_$i\">Błędne nazwisko</label>";
                }
                ?>
            </div>
            <hr>
        </div>
        </div>
        <?php
    }
    ?>
    <button type=" submit">Dalej</button>
</form>