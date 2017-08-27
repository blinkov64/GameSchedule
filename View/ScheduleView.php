<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Schedule</title>
        <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/schedule.css">
</head>
<body>
    <div class="container">
        <header>
            <a href="/"><img src="/public/images/logo-opt.png"></a>
        </header>

        <div class="content">
            <span class="title">Game Schedule</span>
        </div>

        <footer>
                <!--<h1>footer</h1>-->
        </footer>
    </div>
    <?php if(lcfirst($viewName) == "signup"):?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
    <script src="/static/js/jquery-3.2.0.js"></script>
    <?php if(file_exists(ROOT."/static/js/".$fileName.".js")):?>
    <script src="/static/js/<?php echo $fileName?>.js"></script>
    <?php endif; ?>
</body>
</html>