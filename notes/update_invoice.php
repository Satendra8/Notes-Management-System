<?php
include "connect.php";
if (isset($_POST['update_invoice'])) {
    $order_id = $_POST["id"];
    echo $_POST['customer_pan'];
    $statement = $conn->prepare("
        DELETE FROM tbl_items WHERE order_id = :order_id
    ");
    $statement->execute(
        array(
            ':order_id'   => $order_id
        )
    );

    for ($count = 0; $count < $_POST["total_item"]; $count++) {
        $statement = $conn->prepare("
            INSERT INTO tbl_items
            (order_id, item_name, quantity, price, discount, item_total)
            VALUES (:order_id, :item_name, :quantity, :price, :discount, :item_total)            
        ");
        $statement->execute(
            array(
                ':order_id'  =>  $order_id,
                ':item_name' => trim($_POST["particulars"][$count]),
                ':quantity'  => trim($_POST["qty"][$count]),
                ':price'     => trim($_POST["amount"][$count]),
                ':discount'  => trim($_POST["discount"][$count]),
                ':item_total' => trim($_POST["total"][$count]),
            )
        );
        $result = $statement->fetchAll();
    }
    $statement = $conn->prepare("
    UPDATE tbl_order
    SET invoice_type = :invoice_type,
        order_date = :order_date,
        customer_name = :customer_name,
        particulars = :particulars,
        customer_address = :customer_address,
        customer_pan = :customer_pan,
        customer_gst = :customer_gst,
        total = :total,
        gst = :gst,
        grand_total = :grand_total
    WHERE invoice_id = :order_id
    
    ");

    $check = $statement->execute(
        array(
            ':invoice_type'    => trim($_POST["invoice_type"]),
            ':order_date'    => trim($_POST["order_date"]),
            ':customer_name' => trim($_POST["customer_name"]),
            ':particulars'   => trim($_POST["particular"]),
            ':customer_address' => trim($_POST["customer_address"]),
            ':customer_pan'     => trim($_POST["customer_pan"]),
            ':customer_gst'     => trim($_POST['customer_gst']),
            ':total'            => trim($_POST["sub_total"]),
            ':gst'              => trim($_POST["gst"]),
            ':grand_total'      => trim($_POST["net"]),
            ':order_id'       => $order_id

        )
    );
    $result = $statement->fetchAll();
    // print_r($statement->errorInfo());
    // exit;
    if($check){
        print_r($check);
    }
    else{
        print_r($check);
    }
    header("location:index.php");
}
?>

<head>
    <?php include("head.php"); ?>
</head>

<?php
include("header.php");

include("sidebar.php");
?>

<!-- main content start -->
<div class="main-container">
    <?php
    include('connect.php');


    if (isset($_GET["id"])) {
        $statement = $conn->prepare("
            SELECT * FROM tbl_order
            WHERE invoice_id = :order_id
            LIMIT 1
        
        ");
        $statement->execute(
            array(
                ':order_id'    => $_GET["id"]
            )
        );
        $result = $statement->fetchAll();
        // print_r(date('d/m/Y', strtotime($result[0]['order_date'])));
        foreach ($result as $row) {
    ?>
            <script>
                $(document).ready(function() {
                    $('#order_date').val("<?php echo date('Y-m-d', strtotime($result[0]['order_date'])) ?>");
                    $('#customer_name').val("<?php echo $row["customer_name"] ?>");
                    $('#particular').val("<?php echo $row["particulars"] ?>");
                    $('#customer_address').val("<?php echo $row["customer_address"] ?>");
                    $('#customer_pan').val("<?php echo $row["customer_pan"] ?>");
                    $('#customer_gst').val("<?php echo $row["customer_gst"] ?>");
                });
            </script>
            <div class="card">
                <div style="text-align:center;" class="card-header">
                    <h3>Update Invoice</h3>
                </div>

                <div class="card-body">
                    <form method="POST" id="invoice_form">
                    <input type="hidden" name="id" value="<?= $_GET["id"]?>" />
                        <div class="form-group row">
                            <label class="col-sm-3">Order Date : </label>
                            <div class="col-sm-3">
                                <input type="date" name="order_date" id="order_date"/>
                            </div>
                            <label class="col-sm-3">Customer Name* : </label>
                            <div class="col-sm-3">
                                <input type="text" name="customer_name" id="customer_name" />
                            </div>
                            <label class="col-sm-3">Particulars* : </label>
                            <div class="col-sm-3">
                                <input type="text" name="particular" id="particular" />
                            </div>
                            <label class="col-sm-3">Address : </label>
                            <div class="col-sm-3">
                                <textarea type="text" name="customer_address" id="customer_address" ></textarea>
                            </div>
                            <label class="col-sm-3">GST/VAT : </label>
                            <div class="col-sm-3">
                                <input type="text" name="customer_gst" id="customer_gst" />
                            </div>
                            <label class="col-sm-3">PAN : </label>
                            <div class="col-sm-3">
                                <input type="text" name="customer_pan" id="customer_pan" />
                            </div>
                            <label class="col-sm-3">Invoice type* : </label>
                            <div class="col-sm-3">
                                <select name="invoice_type" id="invoice_type" class="form-control required">
                                    <option value="Hosting" <?= trim(strtolower($row['invoice_type']))=='hosting' ? 'selected' : '' ?> >Hosting</option>
                                    <option value="Publications" <?= trim(strtolower($row['invoice_type']))=='publications' ? 'selected' : '' ?>>Publication</option>
                                    <option value="Conference" <?= trim(strtolower($row['invoice_type']))=='conference' ? 'selected' : '' ?>>Conference</option>
                                    <option value="Award" <?= trim(strtolower($row['invoice_type']))=='award' ? 'selected' : '' ?>>Award</option>
                                    <option value="S/W Development" <?= trim(strtolower($row['invoice_type']))=='s/w development' ? 'selected' : '' ?>>S/W Development</option>
                                    <option value="WebDesign"  <?= trim(strtolower($row['invoice_type']))=='webdesign' ? 'selected' : '' ?>>WebDesign</option>
                                    <option value="AppDesign" <?= trim(strtolower($row['invoice_type']))=='appdesign' ? 'selected' : '' ?>>AppDesign</option>
                                    <option value="LogoDesign" <?= trim(strtolower($row['invoice_type']))=='logodesign' ? 'selected': '' ?>>LogoDesign</option>
                                </select>
                            </div>


                        </div>
                        <div class="card" style="box-shadow : 0 0 15px lightgrey; margin-top:10px; ">
                            <div align="center" class="card-body">
                                <h4>Make a Order List</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="invoice-item-table " style="width:1200px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th style="text-align:center;">Particulars</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th style="text-align:center;">Amount(Rs.)</th>
                                            <th style="text-align:center;">Discount</th>
                                            <th style="text-align:center;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoice_item">
                                        <?php
                                        $statement = $conn->prepare("
                                    SELECT * FROM tbl_items
                                    WHERE order_id = :order_id
                                ");
                                        $statement->execute(
                                            array(
                                                'order_id'    => $_GET["id"]
                                            )
                                        );
                                        $item_result = $statement->fetchAll();
                                        $m = 0;
                                        foreach ($item_result as $sub_row) {
                                            $m = $m + 1;
                                        ?>
                                            <tr>
                                                <td id="sr_no"><?php echo $m; ?></td>
                                                <td style="text-align:center;"><input type="text" name="particulars[]" id="particulars<?php echo $m; ?>" value="<?php echo $sub_row["item_name"]; ?>" /></td>
                                                <td style="text-align:center;"><input type="number" class="qty" name="qty[]" id="qty<?php echo $m; ?>" value="<?php echo $sub_row["quantity"]; ?>" /></td>
                                                <td style="text-align:center;"><input type="number" class="amount" name="amount[]" id="amount<?php echo $m; ?>" value="<?php echo $sub_row["price"]; ?>" /></td>
                                                <td style="text-align:center;"><input type="number" class="discount" name="discount[]" id="discount<?php echo $m; ?>" value="<?php echo $sub_row["discount"]; ?>" /></td>
                                                <td style="text-align:center;"><input type="text" class="total" name="total[]" id="total<?php echo $m; ?>" value="<?php echo $sub_row["item_total"]; ?>" /></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <center style="padding:10px;">
                                    <div id="add" style="width:150px; " class="btn btn-success">Add</div>
                                </center>
                            </div>
                        </div>

                        <div style="padding:10px;" class="form-group row">
                            <label class="col-lg-6">Total : </label>
                            <div class="col-lg-6">
                                <input id="sub_total" name="sub_total" type="text" value="<?php echo $row["total"]; ?>">
                            </div>

                            <label class="col-lg-6">GST(18%) : </label>
                            <div class="col-lg-6">
                                <input id="gst" name="gst" type="text" value="<?php echo $row["gst"]; ?>">
                            </div>
                            <label class="col-lg-6">Grand Total : </label>
                            <div class="col-lg-6">
                                <input id="net" name="net" type="text" value="<?php echo $row["grand_total"]; ?>">
                            </div>
                            <label class="col-sm-6">in words : </label>
                            <div class="col-sm-6">
                                <span id="words">Zero</span>
                            </div>
                        </div>

                        <center style="padding:10px;">
                            <input type="hidden" name="total_item" id="total_item" value="<?php echo $m; ?>" />
                            <input type="hidden" name="order_id" id="order_id" value="<?php echo $row["order_id"]; ?>" />
                            <button style="width:150px; " type="submit" id="order" name="update_invoice" class="btn btn-primary">Update</button>
                        </center>
                    </form>
                    <script>
                        $(document).ready(function() {
                            var total_amt = $('#net').val();
                            var count = <?php echo $m; ?>;
                            $(document).on('click', '#add', function() {
                                count++;
                                $('#total_item').val(count);

                                var html_code = '';
                                html_code += '<tr id="row_id_' + count + '">';
                                html_code += '<td <span id="sr_no">' + count + '</span></td>';
                                html_code += '<td style="text-align:center;"><input type="text" name="particulars[]" id="particulars' + count + '" data-srno="' + count + '" required/></td>';
                                html_code += '<td style="text-align:center;"><input type="text" class="qty" name="qty[]" id="qty' + count + '" data-srno="' + count + '" required/></td>';
                                html_code += '<td style="text-align:center;"><input type="number" class="amount" name="amount[]" id="amount' + count + '" data-srno="' + count + '"  required/></td>';
                                html_code += '<td style="text-align:center;"><input type="number" class="discount" name="discount[]" id="discount' + count + '" data-srno="' + count + '" value="0"/></td>';
                                html_code += '<td style="text-align:center;"><input type="text" class="total" name="total[]" id="total' + count + '" data-srno="' + count + '" readonly/></td>';
                                html_code += '<td style="text-align:center;"><button type="button" class="delete" name="delete[]" id="' + count + '" data-srno="' + count + '"><img src="images/trash.svg"></button></td>';
                                html_code += '</tr><br>';

                                $("#invoice_item").append(html_code);
                            });

                            $(document).on('click', '.delete', function() {
                                var row_id = $(this).attr("id");
                                var total_item_amount = $('#total' + row_id).val();
                                var final_amount = $('#sub_total').val();
                                var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                                $('#sub_total').val(result_amount);
                                $('#row_id_' + row_id).remove();
                                count--;
                                $('#total_item').val(count);
                            });

                            function calculate(count) {
                                var final_item_total = 0;
                                for (j = 1; j <= count; j++) {

                                    var quantity = 0;
                                    var price = 0;
                                    var discount = 0;
                                    var item_total = 0;

                                    quantity = $('#qty' + j).val();
                                    if (quantity > 0) {
                                        price = $('#amount' + j).val();

                                        if (price > 0) {
                                            item_total = parseFloat(quantity) * parseFloat(price);

                                            discount = $('#discount' + j).val();
                                            if (discount > 0) {
                                                discount = (item_total * parseFloat(discount)) / 100;
                                            }
                                            item_total = item_total - discount;
                                            final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                                            $('#total' + j).val(item_total);
                                        }
                                    }
                                }
                                $('#sub_total').val(final_item_total);
                                $('#gst').val(final_item_total * 0.18);
                                $('#net').val(final_item_total + (final_item_total * 0.18));
                                $("#words").html(numberToWords(final_item_total + (final_item_total * 0.18)));
                            }

                            $(document).on('blur', '.amount', function() {
                                calculate(count);
                            });

                            $(document).on('blur', '.qty', function() {
                                calculate(count);
                            });

                            $(document).on('blur', '.discount', function() {
                                calculate(count);
                            });

                            $('#order').click(function() {
                                if (($('#customer_name').val().trim()).length == 0) {
                                    alert("Please Enter Customer Name");
                                    return false;
                                }

                                if (($('#particular').val().trim()).length == 0) {
                                    alert("Please Enter Particulars");
                                    return false;
                                }

                                if ((($('#customer_gst').val().trim()).length != 15)) {
                                    alert("Please Enter Valid GST");
                                    return false;
                                }

                                if ((($('#customer_pan').val().trim()).length != 10)) {
                                    alert("Please Enter Valid PAN");
                                    return false;
                                }

                                for (var no = 1; no <= count; no++) {
                                    if (($('#particulars' + no).val().trim()).length == 0) {
                                        alert("Please Enter Item Name");
                                        $('#particulars' + no).focus();
                                        return false;
                                    }

                                    if (($('#qty' + no).val().trim()).length == 0) {
                                        alert("Please Enter Item Quantity");
                                        $('#qty' + no).focus();
                                        return false;
                                    }

                                    if (($('#amount' + no).val().trim()).length == 0) {
                                        alert("Please Enter Item Price");
                                        $('#amount' + no).focus();
                                        return false;
                                    }

                                }

                                $('#invoice_form').submit();

                            });

                            function numberToWords(number) {
                                var digit = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
                                var elevenSeries = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
                                var countingByTens = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
                                var shortScale = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];

                                number = number.toString();
                                number = number.replace(/[\, ]/g, '');
                                if (number != parseFloat(number)) return 'not a number';
                                var x = number.indexOf('.');
                                if (x == -1) x = number.length;
                                if (x > 15) return 'too big';
                                var n = number.split('');
                                var str = '';
                                var sk = 0;
                                for (var i = 0; i < x; i++) {
                                    if ((x - i) % 3 == 2) {
                                        if (n[i] == '1') {
                                            str += elevenSeries[Number(n[i + 1])] + ' ';
                                            i++;
                                            sk = 1;
                                        } else if (n[i] != 0) {
                                            str += countingByTens[n[i] - 2] + ' ';
                                            sk = 1;
                                        }
                                    } else if (n[i] != 0) {
                                        str += digit[n[i]] + ' ';
                                        if ((x - i) % 3 == 0) str += 'Hundred ';
                                        sk = 1;
                                    }
                                    if ((x - i) % 3 == 1) {
                                        if (sk) str += shortScale[(x - i - 1) / 3] + ' ';
                                        sk = 0;
                                    }
                                }
                                if (x != number.length) {
                                    var y = number.length;
                                    str += 'point ';
                                    for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' ';
                                }
                                str = str.replace(/\number+/g, ' ');
                                return str.trim() + ".";
                            }
                        });
                    </script>
                </div>
            </div>
</div>
<?php
        }
    }
?>

<!-- main content end -->

<?php include("footer.php"); ?>