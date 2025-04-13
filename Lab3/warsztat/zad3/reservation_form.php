<form class="booking-form" action="#" method="post">
  <div class="elem-group">
    <h1>Rezerwuj pokój</h1>
  </div>
  <hr>
  <div class="elem-group">
    <h2>Dane osoby rezerwującej</h2>
  </div>
  <div class="elem-group">
    <label for="name">Imię</label>
    <input type="text" id="name" name="name" placeholder="Jan" value="<?php echo $data->name; ?>" required>
    <?php
    if (!empty($data->name) && !$data->isNameValid()) {
      echo "<label class=\"error\">Błędne imię</label>";
    }
    ?>
  </div>
  <div class="elem-group">
    <label for="surname">Nazwisko</label>
    <input type="text" id="surname" name="surname" placeholder="Kowalski" value="<?php echo $data->surname; ?>"
      required>
    <?php
    if (!empty($data->surname) && !$data->isSurnameValid()) {
      echo "<label class=\"error\">Błędne nazwisko</label>";
    }
    ?>
  </div>
  <div class="elem-group">
    <label for="email">Adres e-mail</label>
    <input type="email" id="email" name="email" placeholder="jan.kowalski@gmail.com"
      value="<?php echo $data->email; ?>" required>
    <?php
    if (!empty($data->email) && !$data->isEmailValid()) {
      echo "<label class=\"error\">Błędny adres email</label>";
    }
    ?>
  </div>
  <div class="elem-group">
    <label for="phone">Numer telefonu</label>
    <input type="tel" id="phone" name="phone" placeholder="123256789" value="<?php echo $data->phone; ?>" required>
    <?php
    if (!empty($data->phone) && !$data->isPhoneValid()) {
      echo "<label class=\"error\">Błędny numer telefonu</label>";
    }
    ?>
  </div>
  <hr>
  <div class="elem-group">
    <label for="guest-count">Liczba gości</label>
    <select id="guest-count" name="guest_count" autocomplete="off" required>
      <option value="">Wybierz liczbę gości</option>
      <?php
      for ($i = 1; $i <= 4; $i++) {
        if ($data->guestCount == $i) {
          echo "<option value=\"$i\" selected>$i</option>";
        } else {
          echo "<option value=\"$i\">$i</option>";
        }
      }
      ?>
    </select>
  </div>
  <hr>
  <div class="elem-group inlined">
    <label for="checkin-date">Data zameldowania</label>
    <input type="date" id="checkin-date" name="checkin_date" value="<?php echo $data->checkInDate; ?>" required>
    <?php
    if (!empty($data->checkInDate) && !$data->isCheckInDateValid()) {
      echo '<label class="error" for="checkin-date">Błędna data zameldowania</label>';
    }
    ?>
  </div>
  <div class="elem-group inlined">
    <label for="checkout-date">Data wymeldowania</label>
    <input type="date" id="checkout-date" name="checkout_date" value="<?php echo $data->checkOutDate; ?>" required>
    <?php
    if (!empty($data->checkOutDate) && !$data->isCheckOutDateValid()) {
      echo '<label class="error" for="checkout-date">Błędna data wymeldowania</label>';
    }
    ?>
  </div>
  <fieldset>
    <legend>Dodatkowe opcje</legend>
    <div class="elem-group">
      <input type="checkbox" id="kid" name="kid" <?php echo $data->kid ? 'checked' : ''; ?>>
      <label for="kid">Łóżko dla dziecka</label>
    </div>
    <div class="elem-group">
      <input type="checkbox" id="ac" name="ac" <?php echo $data->ac ? 'checked' : ''; ?>>
      <label for="ac">Klimatyzacja</label>
    </div>
    <div class="elem-group">
      <input type="checkbox" id="pet" name="pet" <?php echo $data->pet ? 'checked' : ''; ?>>
      <label for="pet">Pobyt ze zwierzęciem</label>
    </div>
  </fieldset>
  <hr>
  <div class="elem-group">
    <label for="notes">Notatki</label>
    <textarea id="notes" name="guest_notes" placeholder="Dodatkowe informacje dla obsługi"
      value="<?php echo $data->notes; ?>"></textarea>
  </div>
  <button type="submit">Dalej</button>
</form>