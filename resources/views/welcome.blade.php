<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
	<h1 class="text-center">Selling Products</h1>
	<table class="table table-bordered">
		<thead>
            <tr>
			    <td>Product</td>
			    <td>Code</td>
			    <td>Price</td>
            </tr>
		</thead>
        <tbody>
            <tr>
                <td>Red Widget</td>
                <td>R01</td>
                <td>$32.95</td>
            </tr>
            <tr>
                <td>Green Widget</td>
                <td>G01</td>
                <td>$24.95</td>
            </tr>
            <tr>
                <td>Blue Widget</td>
                <td>B01</td>
                <td>$7.95</td>
            </tr>
        </tbody>
	</table>
    {{-- Delivery Cost --}}
	<h1 class="text-center">Delievery Cost</h1>
	<table class="table">
		<thead>
			<td>Order</td>
			<td>Delievery Cost</td>
		</thead>
		<tr>
			<td>$1 - $50</td>
			<td>$4.95</td>
		</tr>
		<tr>
			<td>$50 - $90</td>
			<td>$2.95</td>
		</tr>
		<tr>
			<td>Above $90</td>
			<td>Free Delivery</td>
		</tr>
	</table>
	
	<h1 class="text-center">Total Products</h1>

	<table class="table">
		<thead>
			<td>Orders</td>
		</thead>
		<tbody id="total-products">
			<tr>
				<td>
				</td>
			</tr>
		</tbody>
	</table>
    <div class="row">
        <div class="col-md-6">
            <strong>Total</strong>
        </div>
        <div class="col-md-6">
            <span id="total-cost"></span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <select class="form-control" id="product-code">
                <option value="R01">R01</option>
                <option value="G01">G01</option>
                <option value="B01">B01</option>
            </select>
        </div>
        <div class="col-md-6">
	        <button class="btn btn-success mb-3" onclick="add_product()"> Add product </button>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">

    var pro = [];
    var pro_prices = { "R01": 32.95, "G01": 24.95, "B01": 7.95 }

    function total_product() {
        var html = ``;
        for (var i = 0; i < pro.length; i ++) {
            html += `<tr>
                        <td> ${pro[i]} </td>
                    </tr>`;
        }
        document.getElementById("total-products").innerHTML = html;
    }

function total_cost() {
	var cost = 0;
	for (var i = 0; i < pro.length; i ++) {
		cost += pro_prices[pro[i]];
	}
	if (pro.filter(item => item == "R01").length > 1) {
		cost -= pro_prices["R01"]/2;
	}
	var delievery_cost = (cost >= 90)? 0: (cost >= 50? 2.95: 4.95);

	var totalCost = Math.floor((cost + delievery_cost) * 100) / 100;

	document.getElementById("total-cost").innerHTML = "$" + totalCost;
}

function add_product() {
	var product_code = document.getElementById("product-code").value;
	if (!pro_prices[product_code]) {
		alert("incorrect product code");
		return;
	}
	pro.push(product_code);
	total_product();
	total_cost();
}

</script>
</html>