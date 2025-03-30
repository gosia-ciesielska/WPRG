<div class="summary">
    <h1>Podsumowanie</h1>   
    <div class="elem-group">
        <h2>Liczba gości</h2>
        <p><?php echo $data->guestCount; ?></p>
    </div>
    <hr>
    <h2>Dane gości</h2>
    <div class="guest-data">
        <h2>Gość 1</h2>
        <div class="elem-group">
            <p><?php echo $data->name; ?> <?php echo $data->surname; ?></p>
        </div>
        <div class="elem-group">
            <p><?php echo $data->email; ?> <?php echo $data->phone; ?></p>
        </div>
        <hr>
    <?php
    if ($data->guestCount > 1) {
        for ($i = 1; $i < $data->guestCount; $i++) {
        ?>   
            <div class="elem-group">
                <h2>Gość <?php echo $i + 1; ?></h2>
                <p><?php echo $guests[$i]->name; ?> <?php echo $guests[$i]->surname; ?></p>
            </div>
            <hr>
        <?php
        }
    }
    ?>
    </div>
    <hr>
    <div class="elem-group inlined">
        <h2>Data zameldowania</h2>
        <p><?php echo $data->checkInDate; ?></p>
    </div>
    <div class="elem-group inlined">
        <h2>Data wymeldowania</h2>
        <p><?php echo $data->checkOutDate; ?></p>
    </div>
    <hr>
    <div class="elem-group">
        <h2>Dodatkowe opcje</h2>
        <?php 
        if ($data->kid) {
        ?>
            <p>Łóżko dla dziecka</p>
        <?php 
        }
        ?>
        <?php 
        if ($data->ac) {
        ?>
            <p>Klimatyzacja</p>
        <?php 
        }
        ?>
        <?php 
        if ($data->pet) {
        ?>
            <p>Pobyt ze zwierzęciem</p>
        <?php 
        }
        ?>
    </div>
    <hr>
    <div class="elem-group">
        <h2>Notatki</h2>
        <p><?php echo $data->notes; ?></p>
    </div>
</div>