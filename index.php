<!doctype html>
<html>
<head lang="en">
<meta charset="utf-8">
<title>GarageTesla Cloud</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body >
<div class="container" >
<div class="row">
<div class="col-md-8">
<h1><a>GarageTesla Cloud - Загрузить файл</a></h1>
<hr> 
<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data"  >
<div class="form-group">
<label for="name">Имя</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" required />
</div>
<div class="form-group">
<label for="lastname">Фамилия </label>
<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Введите фамилию" required />
</div>
<input id="uploadImage" type="file" accept="*"  class="dropzone" id="my-awesome-dropzone" name="image"/>
<div id="preview"></div><br>
<input class="btn btn-success" type="submit" value="Загрузить">
</form>
<div id="err"></div>
<hr>





<h1><a>GarageTesla Cloud - Найти файлы</a></h1>
<hr> 
<form id="form" action="find.php">
<div class="form-group">
<label for="name">Имя</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" required />
</div>
<div class="form-group">
<label for="lastname">Фамилия </label>
<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Введите фамилию" required />
</div>

<div id="preview"></div><br>
<input class="btn btn-success" type="submit" value="Найти">
</form>

<div id="err"></div>
<hr>
</div>
</div>
</div></body></html>