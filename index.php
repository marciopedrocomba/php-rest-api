<?php

echo "Hey Welcome!<br>";



echo "Try the following endpoints: <br><br>";

//GET
echo "GET: domain/Controller/api/read/user.php<br><br>";


//POST
echo "POST: domain/Controller/api/create/user.php<br>";
echo "{<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;name<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;email<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;password<br>";
echo "}<br><br>";

//PUT / PATCH
echo "PUT/PATCH: domain/Controller/api/update/user.php?id=1<br>";
echo "{<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;name<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;email<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;password<br>";
echo "}<br><br>";

//DELETE
echo "DELETE: domain/Controller/api/delete/user.php?id=1<br>";