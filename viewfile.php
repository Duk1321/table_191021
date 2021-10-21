<?php
    include 'header.php';
    $file = $_GET['file'];
    $file_cut = explode("\n\n",fread(fopen($file,"r"),filesize($file)));
?>

<div class="container-fluid">
    <p class="ms-5 mb-0">BỘ NN & PTNT</p>
    <p class="fs-5 fw-bold">TRƯỜNG ĐẠI HỌC THỦY LỢI</p>
</div>

<h1 class="text-center">KẾT QUẢ BÀI THI ỨNG DỤNG CÔNG NGHỆ THÔNG TIN</h1>

<div class="container-fluid pt-5">
    <div>
        <?php   
            $title = explode("\n",$file_cut[0]);
            $quiz_name = explode(":",$title[0]);  
            $file_name_cut = explode("/",$file);
            $file_name_cut1 = explode("_",$file_name_cut[1]);
            $full_name = explode(":",$title[1]);
            $name_cut = explode(",",$full_name[1]);
            $score = explode(":",$title[4]);
            $date = explode(":",$title[7]);
            $date1 = explode(",",$date[1]);
            $date2 = explode("tháng",$date1[0]);
        ?>

        <div class="row">
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Số báo danh:" ?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$file_name_cut1[3]" ?>
            </div>
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Họ và tên: "?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$name_cut[1] $name_cut[0]"; ?>
            </div>
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Điểm: " ?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$score[1]"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Tệp:"?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$file"?>
            </div>
        </div>
        <div class="row">
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Ngày thi:"?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$date2[0]-$date2[1]-$date1[1]"; ?>
            </div>
            <div class="col-auto .me-auto fw-bold">
                <?php echo "Giờ nộp bài:"?>
            </div>
            <div class="col-auto .me-auto">
                <?php echo "$name_cut[1] $name_cut[0]"?>
            </div>

        </div>
        <div class="pt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-dark ">
                        <th class="col" scope="col">STT</th>
                        <th class="col-4" scope="col">Nội dung câu hỏi</th>
                        <th class="col" scope="col">Điểm đạt</th>
                        <th class="col-4" scope="col">Đáp án đã chọn</th>
                        <th class="col-3" scope="col">Đáp án chính xác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                for ($i = 1 ; $i < count($file_cut) -1; $i++) {
                    $question = explode("\n",$file_cut[$i]);
                    $mark = explode(":",$question[1]);
                    $chose_answer = explode(":",$question[3]);
                    $correct_answer = explode(":",$question[2]);
                    echo "<tr>";
                    echo "<td class=text-center>$i</td>";
                    echo "<td class=text-center>$question[0]</td>";
                    echo "<td class=text-center>$mark[1]</td>";
                    echo "<td class=text-center>$chose_answer[1]</td>";
                    echo "<td class=text-center>$correct_answer[1]</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    include 'footer.php';
?>