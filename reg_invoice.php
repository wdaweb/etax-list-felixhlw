
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>統一發票紀錄</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>請輸入您的統一發票號碼</h1>
    <div class="navbar">
        <li><a href="invoice_list.php">發票清單</a></li>
        <li><a href="getmoney.php">對獎</a></li>
        <li><a href="reg_award.php">輸入獎號</a></li>
        <li><a href="index.php">回首頁</a></li>
    </div>
    <div class="invform">
        <form action="./api/recevie_invoice.php" method="post">
            <label>
                年份：<input type="text" name="year" id="year"><br>
                期別：<select name="period" id="period">
                    <option value="1">1,2月</option>
                    <option value="2">3,4月</option>
                    <option value="3">5,6月</option>
                    <option value="4">7,8月</option>
                    <option value="5">9,10月</option>
                    <option value="6">11,12月</option>
  
                </select>
            </label>
            <label>
                發票號碼：<input type="text" name="code" id="code">
            <input type="number" name="number" id="number">
            </label>
            <label>
                發票金額：<input type="number" name="expend" id="expend">
            </label>
            <label>
                <input type="submit" value="送出">
            </label>

        </form>
    </div>
</body>
</html>