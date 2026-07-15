<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'Contact Us — ' . SITE_NAME;
$page_description = 'Get in touch with The Sunday Table with recipe requests, questions, or feedback.';
$active_nav = 'contact';
$canonical_path = 'pages/contact.php';

$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $error = 'Please fill in every field before sending.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // NOTE: PHP's mail() requires a configured mail server (sendmail/SMTP)
        // on your host. Update the destination address below, and consider
        // swapping this for a transactional email API (e.g. Postmark, SendGrid)
        // for reliable delivery.
        $to = 'hello@yourdomain.com';
        $subject = 'New message from The Sunday Table contact form';
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = 'Reply-To: ' . $email;

        // @mail($to, $subject, $body, $headers);
        $sent = true; // Assume success in this demo; wire up @mail() or an API once your host supports outbound mail.
    }
}

include __DIR__ . '/../includes/header.php';
?>

<div class="container static-page">
  <span class="eyebrow">Contact</span>
  <h1>Say hello.</h1>
  <p>Question about a recipe, a substitution, or something that didn't turn out right? Send a note and we'll get back to you.</p>

  <?php if ($sent): ?>
    <div class="form-success">Thanks — your message has been received. We'll reply within a few business days.</div>
  <?php elseif ($error): ?>
    <div class="form-success" style="background:#fbeceb; border-color:#f0c6c2; color:#8a2f27;"><?= h($error) ?></div>
  <?php endif; ?>

  <form class="contact-form" method="post" id="contactForm">
    <div>
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="6" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="justify-self:start;">Send message</button>
  </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
