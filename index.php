<?php

$madvi = "PB0501";
$madvii ="";
$date = date('d-m-Y',strtotime("+1 days"));
$tomorrow = date('d-m-Y',strtotime("+7 days"));
   
 
 if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Get the selected value from the 'mySelect' select element
 
$selectedValue = isset($_GET['mdvi']) ? $_GET['mdvi'] : null;


$selectedOptionContent = "TP Tây Ninh";
  if (isset($_GET['mdvi'])) {
    $selectedOption = $_GET['mdvi'];
    switch ($selectedOption) {
      case 'PB0501':
        $selectedOptionContent = "TP Tây Ninh";
        break;
      case 'PB0502':
        $selectedOptionContent = "Gò Dầu";
        break;
      case 'PB0503':
        $selectedOptionContent = "Trảng Bàng";
        break;
        case 'PB0504':
        $selectedOptionContent = "Tân Châu";
        break;
       case 'PB0505':
        $selectedOptionContent = "Châu Thành";
        break;
        case 'PB0506':
        $selectedOptionContent = "Dương Minh Châu";
        break;
         case 'PB0507':
        $selectedOptionContent = "Tân Biên";
        break;
        case 'PB0508':
        $selectedOptionContent = "Hòa Thành";
        break;
        case 'PB0509':
        $selectedOptionContent = "Bến Cầu";
        break;
      default:
        $selectedOptionContent = "TP Tây Ninh";
        break;
    }
  };
  
  // Check if no value is selected
  if ($selectedValue === null || $selectedValue === "") {

    $madvii = 'PB0501';
    
  } else {
    // Process the selected value
 $madvii = $selectedValue;
  }
} ;


$url = 'https://www.cskh.evnspc.vn/TraCuu/GetThongTinLichNgungGiamMaKhachHang?tuNgay='.$date.'&denNgay='.$tomorrow.'&ChucNang=MaDonVi&madvi='.$madvii;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

curl_close($curl);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>abc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
 
 <style>
 thead tr {
    background-color: #5f2b76;
    color: #ffffff;
   text-align: center;
}
th {
    text-align: center;
  font-size: 80%
}
td {
 font-size:70%;
 padding: 3px;
 font-weight: 500;
 color: #5f2b76;
}
table, th, td {
  border: 1px solid #9f9f9f;
  border-collapse: collapse;
}
tbody tr {
   border-bottom: 1px solid #dddddd;
}
tbody tr:nth-of-type(even) {
   background: rgba(95, 43, 118, 0.1);
}

 tbody tr:last-of-type {
    border-bottom: 2px solid #5f2b76;
}
tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.notification {
  font-size:110%  ;
  border-style: solid;
  background-color:#006400;
  color:#fff
  
   }
  p{
 margin: 5%   
  }
}
 </style>
   
</head>

<body>
 

    <div class="p-3">   
 <form method="get">
     <div class="form-group">
         <label for="sl">Lựa chọn khu vực</label>
  <select id="sl" name="mdvi" class="form-control">
  <option value="PB0501" selected>Điện lực Th&#224;nh Phố T&#226;y Ninh</option>
                <option value="PB0502">Điện lực G&#242; Dầu</option>
                <option value="PB0503">Điện lực Trảng B&#224;ng</option>
                <option value="PB0504">Điện lực T&#226;n Ch&#226;u</option>
                <option value="PB0505">Điện lực Ch&#226;u Th&#224;nh</option>
                <option value="PB0506">Điện lực Dương Minh Ch&#226;u</option>
                <option value="PB0507">Điện lực T&#226;n Bi&#234;n</option>
                <option value="PB0508">Điện lực Ho&#224; Th&#224;nh</option>
                <option value="PB0509">Điện lực Bến Cầu</option>  </select>
</div>
<br>
<input id="auto" class="btn btn-primary" type="submit" value="Xem">
</form>

<p>Bạn đang xem khu vực: <?php echo $selectedOptionContent ?> </p>
<p>Từ ngày: <?php echo $date ?> </p>
<p>Đến ngày: <?php echo $tomorrow ?> </p>
 </div>
 
 

  <div class="p-1"> 
  <?php
  

  if ($response !== false) {
  // Successful retrieval of HTML content
  echo $response;
} else {
  // Error occurred while retrieving HTML content
  echo 'Error: Failed to retrieve HTML content.';
}
  ?>
  <br>  <br>  <br>
  </div>  
       <script>
          $('.result-tbl th:nth-child(6), tr td:nth-child(6)').hide();
           $('.result-tbl th:nth-child(1), tr td:nth-child(1)').hide();

    </script>
      

</body>
</html>