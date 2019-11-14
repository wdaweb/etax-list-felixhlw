
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>各期奬號</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="navbar">
        <li>
            <a href="getmoney.php">獎號查詢</a>
        </li>
        <li>
            <a href="index.php">回首頁</a>
        </li>
    </div>
    <h1>登錄統一發票中獎號碼</h1>
    <div class="award-form">
        <form action="./api/recevie_award_number.php" method="post">
            <table>
                <tr>
                    <td colspan="3">
                        年度：<input type="number" name="year" id="year">
                    </td>
                </tr>
                <tr>
                    <td>月份</td>
                    <td>
                        <select name="period" id="period">
                            <option value="1">1,2月</option>
                            <option value="2">3,4月</option>
                            <option value="3">5,6月</option>
                            <option value="4">7,8月</option>
                            <option value="5">9,10月</option>
                            <option value="6">11,12月</option>
                        </select>
                    </td>
                    <td>獎金</td>
                </tr>
                <tr>
                    <td>特別獎</td>
                    <td>
                        <input type="number" name="awa1">
                    </td>
                    <td>1000萬元</td>
                </tr>
                <tr>
                    <td>特獎</td>
                    <td>
                        <input type="number" name="awa2">
                    </td>
                    <td>200萬元</td>
                </tr>
                <tr>
                    <td>頭獎</td>
                    <td>
                        <input type="number" name="awa3[]">
                        <input type="number" name="awa3[]">
                        <input type="number" name="awa3[]">
                    </td>
                    <td>20萬元</td>
                </tr>
                <tr>
                    <td>二獎</td>
                    <td>末 7 位數號碼與頭獎中獎號碼末 7 位相同者</td>
                    <td>4萬元</td>
                </tr>
                <tr>
                    <td>三獎</td>
                    <td>末 6 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                    <td>1萬元</td>
                </tr>
                <tr>
                    <td>四獎</td>
                    <td>末 5 位數號碼與頭獎中獎號碼末 5 位相同者</td>
                    <td>4千元</td>
                </tr>
                <tr>
                    <td>五獎</td>
                    <td>末 4 位數號碼與頭獎中獎號碼末 4 位相同者</td>
                    <td>1千元</td>
                </tr>
                <tr>
                    <td>六獎</td>
                    <td>末 3 位數號碼與頭獎中獎號碼末 3 位相同者</td>
                    <td>2百元</td>
                </tr>
                <tr>
                    <td>增開六獎</td>
                    <td>
                        <input type="number" name="awa4[]">
                        <input type="number" name="awa4[]">
                        <input type="number" name="awa4[]">
                    </td>
                    <td>2百元</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="送出">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>