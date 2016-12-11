<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            section {
                float: left;
                width: 50%;
            }
        </style>
    </head>
    <body>
        <?php
                
        $billTo = "Skillman Lending";
        $invoiceDate = "12/09/2016";
        
        // set initial data
        $subTotal = '';
        $table = '';
        // Table to display invoice data
        $table += '<tr>';
        // Loop through results
        foreach($invoices as $row) {
            $table += '<td>' . $row['developer']. '</td>';
            $table += '<td>' . $row['description']. '</td>';
            $table += '<td>' . $row['hourlyPrice']. '</td>';
            $table += '<td>' . $row['hours']. '</td>';
            $table += '<td>' . $row['hourlyPrice'] * $row['hours']. '</td>';
            // Get subtotal
            $subTotal += $row['hourlyPrice'] * $row['hours'];
        }
        // End table row
        $table += '</tr>';
        
        // Subtotal
        $table += '<tr>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td>SUBTOTAL</td>';
        $table += '<td>'. $subTotal. '</td>';
        $table += '</tr>';
        
        // Tax
        $tax= 0.00;
        $table += '<tr>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td>TAX</td>';
        $table += '<td>'. $tax. '</td>';
        $table += '</tr>';
        
        // Total
        $total = $subTotal + $tax;
        $table += '<tr>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td></td>';
        $table += '<td>TOTAL</td>';
        $table += '<td>'. $total. '</td>';
        $table += '</tr>';
        

        ?>
        <div class="section">
            <div class="section">
                <h3>Bill To: '. $billTo . '</h3>
            </div>
            <div class="section">
                <p>DATE: '. $invoiceDate .'</p>
                <p>INVOICE#</p>
                <p>Customer ID</p>
            </div>
        </div>
        <table>
            <tr>
                <th>Developer</th>
                <th>Description</th>
                <th>Hourly Price</th>
                <th>Hours</th>
                <th>Total</th>
            </tr>'
            . $table . 
            '<tr></tr>
        </table>
        <div class="row">
            <h3>Other comments or special instructions</h3>
        </div>
        <textarea cols="60" rows="10" style="border:solid 2px blue;"></textarea>
    </body>
</html>

