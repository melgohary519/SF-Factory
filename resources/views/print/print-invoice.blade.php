<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .headNav{
            display: none;
        }
        .print-invoice{
            width: 210mm;
            height: 100vh;
            background: linear-gradient(to right, #e0dbdb 75%, rgb(12, 12, 68) 25% 100%);
        }
        .headerDivBg1,.headerDivBg2,.headerDivBg3{
            position: absolute;
            height: 10%;
        }
        .headerDivBg1{
            background-color: #acacac;
            width: 60%;
            -webkit-transform: skewX(-35deg);
            top: 0px;

            overflow: hidden;
            z-index: 3;
        }
        .headerDivBg2{
            background-color: #7826AC;
            width: 65%;
            -webkit-transform: skewX(-35deg);
            top: 0px;
            overflow: hidden;
            z-index: 2;
        }
        .headerDivBg3{
            background-color: #cfcfcf;
            width: 75%;
            -webkit-transform: skewX(-35deg);
            top: 0px;
            overflow: hidden;
            z-index: 1;
        }
        .invoice-logo{

                left: 0;
                top: 0;
                width: 25%;
                height: 100%;
        }
        .shape1{
            background: red;
            width: 100px;
            height: 70px;
            transform: rotate(210deg)

        }
        .header-text{
            color: red;
            background: yellow;
            width: 50%;
        }
        .header-text::after{
                content: "";
                display: block;
                position: absolute;
                border-radius: 100% 90%;
                width: 51%;
                height: 75px;
                background-color: white;
                right: 0px;
                top: 35px;
        }
        .wave {
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 70px;
            width: 100%;
            background: dodgerblue;
            z-index: -1;
        }
        .wave::before {
            content: "";
            display: block;
            position: absolute;
            border-radius: 100% 90%;
            width: 51%;
            height: 75px;
            background-color: white;
            right: 0px;
            top: 35px;
        }
        .wave::after {
            content: "";
            display: block;
            position: absolute;
            border-radius: 100% 90%;
            width: 51%;
            height: 75px;
            background-color: dodgerblue;
            left: -8px;
            top: 25px;
        }

    </style>
</head>
<body>
    <div class="print-invoice position-relative">

            <div class="header row" >

                    <div class="header-text" style="z-index: 7">
                        <h1 class="w-50 text bg-gray">فاتورة شراء</h1>
                        <p>
                            رقم الفاتورة : 1523
                        </p>
                        <p>
                            التاريخ : 15-12-2024
                        </p>
                    </div>
                    {{--  <div>
                        <div class="headerDivBg1"></div>
                        <div class="headerDivBg2"></div>
                        <div class="headerDivBg3"></div>
                    </div>  --}}
                    <div class="invoice-logo position-absolute" >
                        <img src="..." alt="اللوجو">
                    </div>

            </div>

            <div class="row">
                <div class="shape1">
                    test
                </div>
                <div class="shape1">
                    test
                </div>
            </div>
    </div>

</body>
</html>
