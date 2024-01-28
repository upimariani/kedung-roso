<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<form action="<?= base_url('cCoba/hitung') ?>" method="POST">
		<table>
			<tr>
				<td>PRODUCT</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>TENOR</td>
				<td><input type="number" id="simulator_tenure" name="tenor"></td>
			</tr>
			<tr>
				<td>RATE</td>
				<td><input type="text" id="simulator_interest_monthly" name="rate">%</td>
			</tr>
			<tr>
				<td>AMOUNT</td>
				<td><input type="text" id="simulator_sum" name="amount"></td>
				<td>
					<p id="demo"></p>
				</td>
			</tr>
			<tr>
				<td><button type="submit">Hitung</button></td>
			</tr>
		</table>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(function() {
			$("#uang").keyup(function(e) {
				$(this).val(format($(this).val()));
				var tanpa_format = document.getElementById("uang").value
				document.getElementById("demo").innerHTML = "<b>" + tanpa_format + "</b>";
			});

		});
		var format = function(num) {
			var str = num.toString().replace("", ""),
				parts = false,
				output = [],
				i = 1,
				formatted = null;
			if (str.indexOf(".") > 0) {
				parts = str.split(".");
				str = parts[0];
			}
			str = str.split("").reverse();
			for (var j = 0, len = str.length; j < len; j++) {
				if (str[j] != ",") {
					output.push(str[j]);
					if (i % 3 == 0 && j < (len - 1)) {
						output.push(",");
					}
					i++;
				}
			}
			formatted = output.reverse().join("");
			return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
		};
	</script>
</body>

</html>