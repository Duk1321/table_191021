<?php
    include 'header.php';
?>

<div>
    <h1 class="text-center">ĐẠI HỌC THỦY LỢI</h1>
</div>

<div class="container-fluid pt-5">
    <table class="table table-bordered">
        <thead>
            <tr class="table-primary">
                <th class="col" scope="col">STT</th>
                <th class="col-1" scope="col">Số báo danh</th>
                <th class="col-2" scope="col">Mã bài thi</th>
                <th class="col-1" scope="col">Ngày thi</th>
                <th class="col-1" scope="col">Giờ nộp bài</th>
                <th class="col" scope="col">Điểm thi</th>
                <th class="col-4" scope="col">Tệp kết quả</th>
                <th class="col" scope="col">Kí tên</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $files = scandir('./result');
            for ($i = 3; $i < count($files); $i++ ){
                $file_1 = $files[$i];
                $items = explode('_',$file_1);
                $mark = explode('.',$items[6])[0];
                $path = 'result/'.$file_1;
            
                echo "<tr>";
                    echo "<td>" . ($i - 2) . "</td>";
                    echo "<td>$items[3]</td>";
                    echo "<td>$items[2]</td>";
                    echo "<td>$items[4]</td>";
                    echo "<td>$items[5]</td>";
                    echo "<td>$mark/30</td>";
                    echo '<td><a href="viewfile.php?file=result/' . $files[$i] . '">' . $files[$i] . '</a></td>';
                    echo "<td></td>";
                echo "</tr>";
                // echo "<tr>
                //         <td>".($i -2)."</td>
                //         <td>$items[3]</td>
                //         <td>$items[2]</td>
                //         <td>$items[4]</td>
                //         <td>$items[5]</td>
                //         <td>$mark/30</td>
                //         <td><a href='viewfile.php?file='.$files[$i]''></a><td>
                //     </tr>";
            }
            ?>

        </tbody>
    </table>
</div>


<?php
    include 'footer.php'
?>