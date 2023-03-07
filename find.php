<html>
<head>
<title>Файлы для загрузки</title>
<style type="text/css">
.table_sort table {
    border-collapse: collapse;
}

.table_sort th {
    color: 
#ffebcd;
    background: 
#008b8b;
    cursor: pointer;
}

.table_sort td,
.table_sort th {
    width: 3505px;
    height: 60px;
    text-align: center;
    border: 2px solid 
#846868;
}

.table_sort tbody tr:nth-child(even) {
    background: 
#e3e3e3;
}

th.sorted[data-order="1"],
th.sorted[data-order="-1"] {
    position: relative;
}

th.sorted[data-order="1"]::after,
th.sorted[data-order="-1"]::after {
    right: 8px;
    position: absolute;
}

th.sorted[data-order="-1"]::after {
    content: "▼"
}

th.sorted[data-order="1"]::after {
    content: "▲"
}
}
</style>
</head>
<body>
<script>
document.addEventListener('DOMContentLoaded', () => {

const getSort = ({ target }) => {
    const order = (target.dataset.order = -(target.dataset.order || -1));
    const index = [...target.parentNode.cells].indexOf(target);
    const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
    const comparator = (index, order) => (a, b) => order * collator.compare(
        a.children[index].innerHTML,
        b.children[index].innerHTML
    );

    for(const tBody of target.closest('table').tBodies)
        tBody.append(...[...tBody.rows].sort(comparator(index, order)));

    for(const cell of target.parentNode.cells)
        cell.classList.toggle('sorted', cell === target);
};

document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

});
</script>
<?php
$name = $_REQUEST['name']; 
$lastname = $_REQUEST['lastname'];
include_once 'db.php';
$sql = "SELECT * FROM `uploading` WHERE `name` = '$name' || `lastname` = '$lastname'";
$result = $db->query($sql);
function doesItExist(array $arr) {
    // Создаём новый массив
    $data = array(
        'name' => $arr['name'] != false ? $arr['name'] : 'Нет данных',
        'lastname' => $arr['lastname'] != false ? $arr['lastname'] : 'Нет данных',
    );
    return $data; // Возвращаем этот массив
}

function countPeople($result) { 
    // Проверка на то, что строк больше нуля
    if ($result -> num_rows > 0) {
        // Цикл для вывода данных
        echo "<h2><a href='/'>Вернуться на главную</a></h2>";
        echo "<table class='table_sort'>
        <thead>
        <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Файл</th>
        <th>Время</th>
        <th>Скачать</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($result as $row) {
           
            // Получаем массив с строками которые нужно выводить
            $arr = doesItExist($row);
            // Вывод данных
           echo "
	       <tr>
			<td>". $row['name'] ."</td>
			<td>". $row['lastname'] ."</td>
			<td>". $row['file_name'] ."</td>
			<td>". $row['time'] ."</td>
            <td><a href='".'https://cloud.garagetesla.com/'.$row['file_name']."'>Скачать</a> </td>
            </tr>
        ";
        }
    echo "
    
		
	</tbody>
    </table>";
        
    // Если данных нет
    } else {
        echo "Не кто не найден";
    }
}
countPeople($result);
?>