<div style="width: 210mm; margin: 0 auto; background-color: white;" class="bg-white color-black invoice-print">
    <style>
        .invoice-print * {
            color: black;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .shape1{
            height: 100%;
            left: -110px;
        }
        .custom-shape-div {
    position: relative;
    width: 100%;
    height: 300px; /* يمكنك تعديل الارتفاع */
    background-color: #3498db; /* لون الخلفية */
    clip-path: polygon(55% 0, 75% 0, 100% 100%, 0% 100%);
    -webkit-clip-path: polygon(55% 0, 75% 0, 100% 100%, 0% 100%); /* دعم لمتصفحات WebKit */
    color: white; /* لون النص */
    text-align: center;
    padding: 20px;
}

        
       
    </style>
    <div class="header">
       
        <div class="d-flex position-relative">
            <div class="bg-info custom-shape-div" style="z-index:0">
                <h1>فاتورة البيع</h1>
                <p>رقم الفاتورة: 12345</p>
                <p>التاريخ: 2023-10-01</p>
            </div>
            {{-- <svg class="position-absolute shape1" xmlns="http://www.w3.org/2000/svg">
                <path d="M150 5 L30 200 L225 200 Z"
                style="fill:blue;" />
              </svg> --}}
              {{-- <svg class="position-absolute shape1" viewBox="0 0 100 100" style="width: 100%">
                <polygon points="55 0, 75 0, 100 100, 0 100" />
            </svg> --}}
        </div>
        
          <div class="">
            <img src="path/to/logo.png" alt="Logo" style="max-height: 100px;">
        </div>
    </div>
    
    <h2>Customer Details</h2>
    <p>Name: John Doe</p>
    <p>Address: 123 Main St, Anytown, USA</p>
    <p>Email: john.doe@example.com</p>
    
    <h2>Purchase Details</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Item 1</td>
                <td>2</td>
                <td>$10.00</td>
                <td>$20.00</td>
            </tr>
            <tr>
                <td>Item 2</td>
                <td>1</td>
                <td>$15.00</td>
                <td>$15.00</td>
            </tr>
        </tbody>
    </table>
    
    <h2>Total Amount</h2>
    <p>$35.00</p>
</div>