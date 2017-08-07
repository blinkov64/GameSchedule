<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Schedule</title>
        <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/admin/index.css">
        <link rel="stylesheet" href="/public/css/adminPlace/index.css">
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
            
            <a href="/admin/place/create">
                <span class="create-place">
                    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 256 256" height="16px" id="Layer_1" version="1.1" viewBox="0 0 256 256" width="16px" xml:space="preserve"><path  class="create-icon-color"fill="black" d="M208,122h-74V48c0-3.534-2.466-6.4-6-6.4s-6,2.866-6,6.4v74H48c-3.534,0-6.4,2.466-6.4,6s2.866,6,6.4,6h74v74  c0,3.534,2.466,6.4,6,6.4s6-2.866,6-6.4v-74h74c3.534,0,6.4-2.466,6.4-6S211.534,122,208,122z"/>
                    </svg>
                    Create Place
                </span>
            </a>
            
            <!--<div class="title">Place List</div>-->
            
            <div class="place-list">
                <div class="place-list-title">
                    <div class="id">Id</div>
                    <div class="id">Name</div>
                    <div class="id">Address</div>
                    <div class="id">Active</div>
                    <div class="id"></div>
                </div>
                <?php foreach($placeList as $place): ?>
                <div class="place-list-item">
                    <div><?php echo $place->id?></div>
                    <div><?php echo $place->name?></div>
                    <div><?php echo $place->address?></div>
                    <div>
                        <?php echo ($place->active == 1) ? 'yes' : 'no'?>
                    </div>
                    <div>
                        <a href="/admin/place/update/<?php echo $place->id ?>">
                        <svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink" height="16px" version="1.1" viewBox="0 0 32 32" width="16px"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g class="edit-icon-color" fill="black" id="icon-136-document-edit"><path d="M26.4432278,12.1503345 L15.1570131,23.4499064 L15.1570131,23.4499064 L12.5514465,20.8443397 L23.8435383,9.55064513 L26.4432278,12.1503345 L26.4432278,12.1503345 Z M27.1499164,11.4428096 L28.8790954,9.71158405 C29.269069,9.32114892 29.266195,8.68650423 28.8743,8.29568497 L27.6944866,7.11910998 C27.3018646,6.72756564 26.6692577,6.72452466 26.2779126,7.11592531 L24.5505949,8.84348817 L27.1499164,11.4428096 L27.1499164,11.4428096 Z M11.9037061,21.6108129 L11.2641602,24.7235103 L14.3990645,24.1061713 L11.9037061,21.6108129 L11.9037061,21.6108129 L11.9037061,21.6108129 Z M22,10 L22,10 L16,3 L5.00276013,3 C3.89666625,3 3,3.89833832 3,5.00732994 L3,27.9926701 C3,29.1012878 3.89092539,30 4.99742191,30 L20.0025781,30 C21.1057238,30 22,29.1017876 22,28.0092049 L22,18 L29.5801067,10.4198932 C30.3642921,9.63570785 30.3661881,8.36618809 29.5897496,7.58974962 L28.4102504,6.41025036 C27.6313906,5.6313906 26.372781,5.62721897 25.5801067,6.41989327 L22,10 L22,10 L22,10 Z M21,19 L21,28.0066023 C21,28.5550537 20.5523026,29 20.0000398,29 L4.9999602,29 C4.45470893,29 4,28.5543187 4,28.004543 L4,4.99545703 C4,4.45526288 4.44573523,4 4.9955775,4 L15,4 L15,8.99408095 C15,10.1134452 15.8944962,11 16.9979131,11 L21,11 L11,21 L10,26 L15,25 L21,19 L21,19 L21,19 Z M16,4.5 L16,8.99121523 C16,9.54835167 16.4506511,10 16.9967388,10 L20.6999512,10 L16,4.5 L16,4.5 Z" id="document-edit"/></g></g>
                        </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <footer>
                <!--<h1>footer</h1>-->
        </footer>
    </div>
</body>
</html>