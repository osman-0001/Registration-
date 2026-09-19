<?php
require_once 'config.php';

if (isset($_POST['create'])) {
    $firstname   = trim($_POST['firstName']);
    $lastname    = trim($_POST['lastName']);
    $phonenumber = trim($_POST['phone']);
    $itemtype    = trim($_POST['itemType']);

    try {
        $sql = "INSERT INTO users (firstname, lastname, phonenumber, itemtype) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$firstname, $lastname, $phonenumber, $itemtype]);

        if ($result) {
            header("Location: registration.php?success=1");
            exit();
        } else {
            header("Location: registration.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: registration.php?error=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chalani Beyn ol-Melali | Registration</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_GET['success'])) {
    echo "<script>alert('Successfully registered!');</script>";
}

if (isset($_GET['error'])) {
    echo "<script>alert('Registration failed!');</script>";
}
?>

<div class="split">

  <!-- LEFT: form -->
  <div class="panel form-panel">
    <div class="form-panel-inner">

      <h1>Registration Form</h1>
      <p class="lead">Fill in your cargo and contact details so we can reach you</p>

      <form id="registration" action="registration.php" method="post">
        <div class="row two-col">
          <div class="field">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
          </div>
          <div class="field">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
          </div>
        </div>

        <div class="field">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" placeholder="07XXXXXXXX" required>
        </div>

        <div class="field">
          <label for="itemType">Item Type</label>
          <input type="text" id="itemType" name="itemType" placeholder="e.g. food items, household goods, machinery" required>
        </div>

        <input type="submit" id="register" class="submit-btn" name="create" value="Register">

        <p id="formStatus" class="form-status" role="status"></p>
      </form>
    </div>
  </div>

  <!-- RIGHT: logo -->
  <div class="panel logo-panel">
    <div class="logo-panel-inner">
      <img src="logo.jpeg" alt="Chalani International Transit Co." class="logo-large">
      <p class="logo-caption farsi-name">بار چالانی بین المللی</p>
      <p class="logo-sub">International Transit &amp; Cargo Co.</p>
    </div>
  </div>

</div>

<footer class="contact-footer">
  <div class="contact-footer-inner">
    <a class="contact-chip" href="https://wa.me/+93783484818" target="_blank" rel="noopener">
      <span class="contact-text"><b>WhatsApp</b><small>+93 783 484 818</small></span>
    </a>

    <a class="contact-chip" href="https://facebook.com/شرکت تجارتی و ترانزیتی و بارچالانی بین المللی نثار انصار هوفیانی" target="_blank" rel="noopener">
      <span class="contact-text"><b>Facebook</b><small>شرکت تجارتی و ترانزیتی و بارچالانی بین المللی نثار انصار هوفیانی</small></span>
    </a>

    <a class="contact-chip" href="tel:+93783484818">
      <span class="contact-text"><b>Phone Number</b><small>+93 783 484 818</small></span>
    </a>

    <div class="contact-chip static">
      <span class="contact-text"><b>Address</b><small>Kabul, Afghanistan</small></span>
    </div>
  </div>

  <p class="copyright">
    © <span id="year"></span>
    <span class="farsi-name">بار چالانی بین المللی</span>
    __ nesar.ansartransit@gmail.com
  </p>
</footer>

<script src="script.js"></script>
</body>
</html>