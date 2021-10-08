<main>
<div>
    <section>
    <h1>Reset your password</h1>
    <form action="includes/reset-request.inc.php" method="post">
        <input type="email" name="Email" placeholder="Enter your email address">
        <button type="submit" name="reset-request-submit">Receive new password by email</button>
        </form>
        <?php
        if(isset($_GET["reset"])){
            if($_GET["reset"] == "success"){
                echo '<p>Check your email account</p>';
            }
        }
        ?>
    </section>
    </div>
</main>