<html>
<head>
<meta charset="UTF-8">
<link href="web/default.css" rel="stylesheet" type="text/css" />
<title>NOTAS</title>
</head>
<body>
<div id="container" style="width: 600px;">
<div id="header">
<h1>ACCESO DE NOTAS</h1>
</div>
<div id="content">
<p><?= $contenido ?></p>
<form method="Get">
   Nº usuario : <input type="text" name="login" value="<?php echo isset($_REQUEST['login']) ? htmlspecialchars($_REQUEST['login']) : ''; ?>"><br>
   <br>
   Contraseña : <input type="passwd" name="clave" value="<?php echo isset($_REQUEST['clave']) ? htmlspecialchars($_REQUEST['clave']) : ''; ?>"><br>
   <input type="submit" value=" Enviar "> 
</form>
</div>
</div>
</body>
</html>
