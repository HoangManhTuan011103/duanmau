<a href="index.php?act=thongke">
        <button style="margin-top: 20px; position: absolute;
    left: 325px;
    z-index: 2; padding: 10px 15px;
    border-radius: 8px;
    color: #fff;
    background-color: #269977;
    border: 1px solid #269977;
    font-weight: bold;
    cursor: pointer;">
            Quay lại trang số liệu
        </button>
    </a>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div
    id="myChart" style="width:100%; max-width:1400px; margin: 0 auto; height:500px; position: relative; left:-130px; top: 30px; z-index: 0">
    </div>
   
    <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Danh mục','Số lượng sản phẩm'],
       <?php
            $totalCat = count($listThongKe);
            $i = 1;
            foreach($listThongKe as $value){
                extract($value);
                if($i == $totalCat){
                    $sign = "";
                }else{
                    $sign = ",";
                }
                echo "['".$value['tendm']."',".$value['countsp']."]".$sign;
                $i++;
            }
       ?>
    ]);

    var options = {
    title:'Thống kê số lượng sản phẩm theo danh mục',
    is3D:true
    };

    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
    }
</script>