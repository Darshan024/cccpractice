<?php
class View_List
{
    public function __construct()
    {
    }
    public function showlist($data)
    {
        echo '<table border="1" style="border-collapse: collapse; width: 80%;">';
        echo '<tr style="background-color: #92aaf2;">';
        foreach ($data[0] as $key => $value) {
            echo "<th style='padding: 10px;'>$key</th>";
        }
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "</tr>";
        foreach ($data as $row) {
            echo "<tr>";

            foreach ($row as $value) {
                echo "<td style='padding: 10px; text-align: center;  background-color: #d5ffbf;'>{$value}</td>";
            }
            echo "<td style='padding: 10px; text-align: center;  background-color: #d5ffbf;'><a href='edit?id={$row['product_id']}'>Edit</a></td>";
            echo "<td style='padding: 10px; text-align: center;  background-color: #d5ffbf;'><a href='delete?id={$row['product_id']}'>Delete</a></td>";

            echo "</tr>";
        }
        echo "</table>";
    }
    
}
