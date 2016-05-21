<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rewiews</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= URL.VIEW.'/assets/css/style.css'; ?>">
    </head>
    <body onload="preview();">
        <h1 class="text-center">Rewiews</h1>
        <div class="container">
        <div class="container errors">
            <?php include URL.CONTROLLER.'/errorsController.php'; ?>
        </div>

            <?php include URL.VIEW.'/reviews.php'; ?>
            <hr style="width: 90%;">
            <div class="container form-container">
            <h4 id="prev_h">Preview:</h4>
                <blockquote id="preview">
                    <p id="content-ou"></p>
                    <footer id="author_name-ou"></footer><br>
                </blockquote>
                <form action="" method="POST" role="form">
                    <legend>Leave a review:</legend>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input onkeyup="preview();" type="text" name="name" class="form-control r-input" id="author_name-in" placeholder="Your name">
                        <label for="">eMail:</label>
                        <input type="email" name="email" class="form-control r-input" id="email" placeholder="Your email">
                        <label for="">Tel:</label>
                        <input type="text" name="telephone" class="form-control r-input" id="phone" placeholder="Your telephone">
                        <label for="">Review:</label>
                        <textarea onkeyup="preview();" rows="5" type="text" name="content" class="form-control r-input" id="content-in" placeholder="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['snd_error']): ?>
            <script>
                document.getElementById('author_name-in').value = "<?=$_POST['name']; ?>";
                document.getElementById('email').value = "<?=$_POST['email']; ?>";
                document.getElementById('phone').value = "<?=$_POST['telephone']; ?>";
                document.getElementById('content-in').value = "<?=$_POST['content']; ?>";
            </script>
            <?php $_SESSION['snd_error'] = false; ?>
        <?php endif; ?>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=URL.VIEW."/assets/js/jquery.maskedinput-1.2.2.js"; ?>"></script>
        <script src="<?= URL.VIEW."/assets/js/custom.js"; ?>"></script>
    </body>
</html>