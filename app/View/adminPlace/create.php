<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Schedule</title>
        <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/admin/index.css">
        <link rel="stylesheet" href="/public/css/adminPlace/create.css">
</head>
<body>
    <div class="container">
        <header>
            <a href="/"><img src="/public/images/logo-opt.png"></a>
            <span class="logout">
                <a href="/admin/logout">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 32 32" height="20px" id="Слой_1" version="1.1" viewBox="0 0 32 32" width="20px" xml:space="preserve"><g id="Sign_Out"><path class="logout-color" d="M15,30H2V2h13c0.552,0,1-0.448,1-1s-0.448-1-1-1H1C0.448,0,0,0.448,0,1v30c0,0.552,0.448,1,1,1h14   c0.552,0,1-0.448,1-1S15.552,30,15,30z" fill="#121313"/><path class="logout-color" d="M31.71,15.302l-6.9-6.999c-0.391-0.395-1.024-0.394-1.414,0c-0.391,0.394-0.391,1.034,0,1.428l5.2,5.275   H8.003c-0.552,0-1,0.452-1,1.01c0,0.558,0.448,1.01,1,1.01h20.593l-5.2,5.275c-0.391,0.395-0.391,1.034,0,1.428   c0.391,0.395,1.024,0.395,1.414,0l6.899-6.999C32.095,16.341,32.099,15.69,31.71,15.302z" fill="#121313"/></g><g/><g/><g/><g/><g/><g/>
                    </svg>
                </a>
            </span>
        </header>

        <div class="content">
            <nav>
                <ul>
                    <li><a href="">Game</a>
                    <li><a href="/admin/place" class="active-menu">Place</a>
                    <li><a href="">Tournament</a>
                    <li><a href="">Team</a>
                </ul>
            </nav>
            <div class="title">Create Place</div>
            <form method="post" action="/admin/place/create">
                <label for="name">Name:</label>
                <div><input type="text" id="name" name="name"></div>
                <label for="address">Address:</label>
                <div><input type="text" id="address" name="address"></div>
                <label for="active">Active:</label>
                <div>
                    <input type="radio" name="active" value="1" checked>Yes
                    <input type="radio" name="active" value="0">No
                </div>
                <input type="submit" value="Create">
            </form>
        </div>

        <footer>
                <!--<h1>footer</h1>-->
        </footer>
    </div>
</body>
</html>