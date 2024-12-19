<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terragrav - Social Crowdfunding Marketplace</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Welcome to Terragrav</h1>
        <p>The first social crowdfunding marketplace to help you partner with top businesses, secure funding, and promote your campaigns.</p>
        <p> Based out of New Jersey </p>
    </header>

    <section class="hero">
        <div class="animated-text">
            <p>Your ideas deserve to be heard.</p>
            <p>Partner, fund, and promote in one place.</p>
        </div>
    </section>
    

    <section class="countdown">
        <h2>Countdown to Launch!</h2>

        <div id="countdown-timer">
            <div id="days">00 Days</div>
            <div id="hours">00 Hours</div>
            <div id="minutes">00 Minutes</div>
            <div id="seconds">00 Seconds</div>
        </div>
    </section>

    <section class="waitlist-form">
        <h2>Join the Terragrav Community</h2>
        <p>Be the first to access our platform, collaborate with businesses, and launch your campaign.</p>
        <form action="process_email.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Join the Waitlist</button>
        </form>
    </section>

    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo '<p>Thank you for signing up! We\'ll notify you when we launch.</p>';
    }
    ?>

    <footer>
        <p>&copy; 2024 Terragrav. All rights reserved.</p>
    </footer>

    <div class="wavy-bg"></div> <!-- This adds the wavy bottom section -->
</body>
</html>
