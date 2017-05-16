<!DOCTYPE html>
<html>
<body>

<div style="border-top: 3px solid #1122FF;border-bottom: 3px solid #1122FF">
    <div style="margin: auto;width: 50%;padding-top: 20px;padding-bottom: 40px">
        <h1>Welcome to Transip FAQ</h1>
        <p>Please login to continue</p>

        <form action="login" method="POST">
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" placeholder="Submit"/>
        </form>
        <br>
        <div style="color: red;">
            <?php
                if(isset($errors)) {
                 foreach ($errors as $error) {
                     echo $error . '<br>';
                 }
                }
            ?>
        </div>
    </div>
</div>

</body>
</html>