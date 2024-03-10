<?php

header('Content-Type: application/json; charset=utf-8');

// Get the current date in Vietnam timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

$currentDate = date('d-m-Y'); // Lấy ngày hiện tại

// Chuyển ngày hiện tại thành một đối tượng DateTime
$currentDateObject = DateTime::createFromFormat('d-m-Y', $currentDate);

// Thêm 1 ngày vào ngày hiện tại
$currentDateObject->add(new DateInterval('P1D'));

// Lấy ngày sau khi đã thêm 1 ngày
$nextDay = $currentDateObject->format('d-m-Y');

// Calculate the date 6 days from now
$nextWeek = strtotime('+2 days', strtotime($nextDay));
$endDate = date('d-m-Y', $nextWeek);

// Get the 'mdv' parameter from the URL
$mdvParam = isset($_GET['mdv']) ? $_GET['mdv'] : 'PB0501';

if (strlen($mdvParam) === 5) {
    $response = array('error' => 'Missing digits in mdv');
    echo json_encode($response);
} else {
    // Tiếp tục xử lý thông tin khi mdv hợp lệ

    $options = array(
        'PB0501' => 'TP Tây Ninh',
        'PB0502' => 'Gò Dầu',
        'PB0503' => 'Trảng Bàng',
        'PB0504' => 'Tân Châu',
        'PB0505' => 'Châu Thành',
        'PB0506' => 'Dương Minh Châu',
        'PB0507' => 'Tân Biên',
        'PB0508' => 'Hòa Thành',
        'PB0509' => 'Bến Cầu',
    );

    // Kiểm tra xem mã số có tồn tại trong mảng $options không
    if (isset($options[$mdvParam])) {
        // Lấy văn bản tương ứng với mã số
        $text = $options[$mdvParam];
    } else {
        $text = 'NULL';
    }

    // Set cookie for 1 hour
    setcookie('lcd_cookie', 'true', time() + 3600, '/'); // Tạo cookie với tên là 'lcd_cookie' và thời gian sống là 1 giờ

    // Base URL
    $baseUrl = 'https://www.cskh.evnspc.vn/TraCuu/GetThongTinLichNgungGiamMaKhachHang';

    // Create the full URL with the mdv parameter, current date, and end date
    $url = "$baseUrl?tuNgay=$currentDate&denNgay=$endDate&ChucNang=MaDonVi&madvi=$mdvParam";

    // Load simple_html_dom library
    require_once 'simple_html_dom.php';

    // Initialize DOM object
    $html = file_get_html($url);

    // Check if the HTML contains the message for no schedule
    if (strpos($html, 'không có lịch ngừng giảm cung cấp điện') !== false) {
        // Create an array with a message indicating no schedule
        $ob = array(
            'currentDate' => $nextDay,
            'endDate' => $endDate,
        );

        $noScheduleData = array(
            'Điện lực' => $text,
            'Ngày' => '',
            'Thời gian từ' => '',
            'Thời gian đến' => '',
            'Khu vực' => 'Không có lịch cắt điện.',
            'Lý do' => '',
        );

        // Add the noScheduleData array to items[]
        $data['items'][] = $noScheduleData;

        // Move 'currentDate' and 'endDate' to the beginning of $data
        $data = array_merge($ob, $data);

        // Convert the data to JSON with HTML entities decoded
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $jsonData = html_entity_decode($jsonData);
    } else {
        // Find the table rows (skip the first row with the headings)
        $rows = $html->find('tr');

        $data = array();
        $tempArray = array(); // Mảng tạm thời để kiểm tra trùng lặp

        // Thêm 'currentDate' và 'endDate' vào mảng ngoài cùng
        $data['currentDate'] = $nextDay;
        $data['endDate'] = $endDate;

        foreach ($rows as $row) {
            // Trích xuất dữ liệu từ DOM
            $dienLuc = $row->find('td', 0) ? str_replace('Điện lực ', '', $row->find('td', 0)->plaintext) : '';
            $ngay = $row->find('td', 1) ? $row->find('td', 1)->plaintext : '';
            $thoiGianTu = $row->find('td', 2) ? $row->find('td', 2)->plaintext : '';
            $thoiGianDen = $row->find('td', 3) ? $row->find('td', 3)->plaintext : '';
            $khuVuc = $row->find('td', 4) ? $row->find('td', 4)->plaintext : '';
            $lyDo = $row->find('td', 5) ? $row->find('td', 5)->plaintext : '';

            // Kiểm tra xem dữ liệu có tồn tại không trước khi thêm vào mảng kết quả
            if (!empty($dienLuc) && !empty($ngay) && !empty($thoiGianTu) && !empty($thoiGianDen) && !empty($khuVuc) && !empty($lyDo)) {
                $rowData = array(
                    'Điện lực' => $dienLuc,
                    'Ngày' => $ngay,
                    'Thời gian từ' => $thoiGianTu,
                    'Thời gian đến' => $thoiGianDen,
                    'Khu vực' => $khuVuc,
                    'Lý do' => $lyDo,
                );

                // Kiểm tra xem dữ liệu đã tồn tại trong mảng tạm thời chưa
                $hash = md5(json_encode($rowData)); // Tạo hash từ dữ liệu để kiểm tra
                if (!in_array($hash, $tempArray)) {
                    $tempArray[] = $hash; // Thêm hash vào mảng tạm thời
                    $data['items'][] = $rowData; // Thêm dữ liệu vào mảng kết quả
                }
            }
        }

        // Convert the data to JSON with HTML entities decoded
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $jsonData = html_entity_decode($jsonData);
    }
    // Output JSON
    echo $jsonData;
}
?>
