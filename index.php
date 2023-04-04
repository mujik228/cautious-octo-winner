<?php
include("bd.php");
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>";
   $query = "SELECT * FROM Персонал";
   if(mysqli_query($conn, $query)) {
    echo "Таблица 'Персонал'";
    $result = mysqli_query($conn, $query);
   }
   else {
    echo "Ошибка запроса: " . mysqli_error($conn); 
   }
   while($row = $result->fetch_array()) {
    $id = $row["ID_Worker"];
    $name = $row["Name"];
    $fam = $row["Fam"];
    $post = $row["Post"];
    $age = $row["Age"];
    $salary = $row["Salary"];
    $work_day = $row["Work_days"];
   }
   echo "<table border='1px'><tr><th>Id</th><th>Имя</th><th>Фамилия</th><th>Должность</th><th>Возраст</th><th>Зарплата</th><th>Количество рабочих дней</th></tr>";
   echo "
   <form action='filter.php' method='post'>
   <p>Фильтрация по зарплате</p>
   <p>От
   <input type='number' method='post' name='sal1'></p>
   <p>До
   <input type='number' method='post' name='sal2'></p><button name='sal_b'>Применить</button>
   <p>Фильтрация по возрасту</p>
   <p>От
   <input type='number' method='post' name='age1'></p>
   <p>До
   <input type='number' method='post' name='age2'></p><button name='age_b'>Применить</button>
   <p>Фильтрация по кол-ву рабочих дней</p>
   <p>От
   <input type='number' method='post' name='wor1'></p>
   <p>До
   <input type='number' method='post' name='wor2'></p><button name='wor_b'>Применить</button>
   </form>";
   foreach($result as $row){
    echo "<tr>";
    echo "<td>" . $row["ID_Worker"] . "</td>";
    $n = $row["ID_Worker"];
    echo "<td>" . $row["Name"] . "</td>";
    echo "<td>" . $row["Fam"] . "</td>";
    echo "<td>" . $row["Post"] . "</td>";
    echo "<td>" . $row["Age"] . "</td>";
    echo "<td>" . $row["Salary"] . "</td>";
    echo "<td>" . $row["Work_days"] . "</td>";
    echo "<td><form action='delete.php' method='post'><button name='$n'>Удалить</button></form></td>";
    echo "<td><form action='updatestr.php?button=$n' id='upd' method='post'><a href='updatestr.php?button=$n'><button name='button'>Изменить</button></a></form></td>";
    echo "</tr>";
   }
   echo "</table>";
 $result->free();
 $conn->close();
 echo"<a href='add.php'>Добавить работника</a>";
echo "</body>
</html>";
?>