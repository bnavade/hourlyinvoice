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
        $invoice = $results[0];  // will be used for single result        
        $billTo = $invoice['billTo'];
        $invoiceDate = 'N/A';
        if($invoice['date'] instanceof \DateTime) {
        $invoiceDate = $invoice['date']->format('m/d/Y');
        $subTotal = '';
        }
        ?>
        <div class="section">
            <div class="section">
                <h3>Bill To: <?php echo $billTo; ?> </h3>
            </div>
            <div class="section">
                <p>DATE: <?php echo $invoiceDate; ?></p>
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
            </tr>
            <?php foreach($results as $row): ?>
            <tr>
                <td><?php echo $row['developer']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo sprintf('%0.2f', $row['hourlyPrice']); ?></td>
                <td><?php echo $row['hours']; ?> </td>
                <td><?php echo sprintf('%0.2f', $row['hourlyPrice'] * $row['hours']); ?></td>
                <?php
                $subTotal += $row['hourlyPrice'] * $row['hours']; 
                ?>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>SUBTOTAL</td>
                <td><?php echo sprintf('%0.2f', $subTotal); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>TAX</td>
                <td><?php 
                $tax = 0.00; 
                echo sprintf('%0.2f', $tax); 
                ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>TOTAL</b></td>
                <td><b><?php echo sprintf('%0.2f', $subTotal + $tax); ?></b></td>
            </tr>
            <tr></tr>
        </table>
        <div class="row">
            <h3>Other comments or special instructions</h3>
        </div>
        <textarea cols="60" rows="10" style="border:solid 2px blue;"></textarea>
    </body>
</html>