<?php
$gross = 0;
$dependants = 0;

$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST') ? true : false;
$gross = $submitted ? floatval($_POST['gross']) : 0;
$dependants = $submitted ? intval($_POST['dependants']) : 0;

$brackets = [
[0, 500000, 0.00],
[500000, 1000000, 0.08],
[1000000, 3000000, 0.18],
[3000000, 6000000, 0.27],
[6000000, 10000000, 0.35],
[10000000, PHP_FLOAT_MAX, 0.42]
];

function calculate_tier_tax($income, $brackets, $index, $breakdown = []) {
return ($index >= count($brackets) || $income <= 0) 
? $breakdown 
: (function() use ($income, $brackets, $index, $breakdown) {
$current = $brackets[$index];
$min = $current[0];
$max = $current[1];
$rate = $current[2];

$taxable_span = $max - $min;
$portion = ($income > $taxable_span) ? $taxable_span : $income;
$tax_charged = $portion * $rate;

$breakdown[] = [
'range' => number_format($min + 1) . ' to ' . ($max == PHP_FLOAT_MAX ? 'Above' : number_format($max)),
'rate' => ($rate * 100) . '%',
'portion' => $portion,
'tax' => $tax_charged
];

return calculate_tier_tax($income - $portion, $brackets, $index + 1, $breakdown);
 })();
}

$breakdown_results = $submitted ? calculate_tier_tax($gross, $brackets, 0) : [];
$base_tax = $submitted ? array_sum(array_column($breakdown_results, 'tax')) : 0;

$has_surcharge = $submitted ? (($gross > 8000000) & ($dependants < 3)) : 0;
$surcharge_amount = $has_surcharge ? ($base_tax * 0.035) : 0;
$total_tax = $base_tax + $surcharge_amount;

$effective_rate = ($submitted && $gross > 0) ? (($total_tax / $gross) * 100) : 0;
$take_home_pay = $submitted ? ($gross - $total_tax) : 0;
$monthly_pay = $take_home_pay / 13;

$tax_class = ($effective_rate < 5) 
? "Class A (Low Burden)" 
: (($effective_rate < 15) 
? "Class B (Moderate)" 
: (($effective_rate < 25) 
? "Class C (High)" 
: "Class D (Critical)"));
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Exam 2</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>

<body class="container py-5" style="max-width: 750px;">

<form action="" method="post" class="card p-4 shadow-sm mb-4">
<div class="row">
<div class="col-md-12">
<center><h4>Tax Calculator</h4></center>
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 d-flex align-items-center">
Gross Income / Salary:
</div>
<div class="col-md-6">
<input type="number" class="form-control" name="gross" placeholder="Gross Income" required value="<?php echo $submitted ? $gross : ''; ?>">
</div>
</div>
<br>

<div class="row">
<div class="col-md-6 d-flex align-items-center">
Number of Dependants:
 </div>
 <div class="col-md-6">
<input type="number" class="form-control" name="dependants" placeholder="No of Dependants" required value="<?php echo $submitted ? $dependants : ''; ?>">
</div>
</div>
<br>

<div class="row">
 <div class="col-md-12">
<input type="submit" class="form-control btn btn-success" value="Calculate Tax">
</div>
</div>
</form>

<?php 
echo $submitted ? '
<div class="card p-4 shadow-sm border-success">
<h4 class="text-success mb-3">Calculation Summary</h4>

<div class="row border-bottom pb-3 mb-3">
<div class="col-sm-6">
<span class="text-muted">Total Net Tax Owed:</span>
<h3 class="text-danger font-weight-bold">UGX ' . number_format($total_tax, 2) . '</h3>
' . ($has_surcharge ? '<small class="text-danger font-weight-bold d-block">* Includes 3.5% Penalty Surcharge (UGX ' . number_format($surcharge_amount, 2) . ')</small>' : '') . '
</div>
<div class="col-sm-6">
<span class="text-muted">Effective Tax Rate:</span>
<h3>' . number_format($effective_rate, 2) . '%</h3>
<span class="badge badge-secondary p-2 mt-1">' . $tax_class . '</span>
</div>
</div>

<h5 class="text-info font-weight-bold">13-Month Pay Structure</h5>
<div class="row bg-light py-3 rounded text-center mb-4">
<div class="col-6 border-right">
<small class="text-muted d-block">Regular Month Pay (1-12)</small>
<span class="h5 text-success font-weight-bold">UGX ' . number_format($monthly_pay, 2) . '</span>
</div>
<div class="col-6">
<small class="text-muted d-block"><span class="badge badge-warning text-dark">Bonus Month</span> (Instalment 13)</small>
<span class="h5 text-success font-weight-bold">UGX ' . number_format($monthly_pay, 2) . '</span>
</div>
</div>

<h5 class="text-info font-weight-bold">Bracket Breakdown Table</h5>
<div class="table-responsive">
<table class="table table-bordered table-striped mt-2">
<thead class="thead-dark">
<tr>
<th>Bracket Range</th>
<th>Rate</th>
<th class="text-right">Taxable Portion</th>
<th class="text-right">Tax Charged</th>
<th class="text-right">Cumulative Tax</th>
</tr>
</thead>
<tbody>' . 
array_reduce($breakdown_results, function($carry, $item) {
$cumulative = $carry['total'] + $item['tax'];
$row = '<tr>
<td>' . $item['range'] . '</td>
<td>' . $item['rate'] . '</td>
<td class="text-right">UGX ' . number_format($item['portion'], 2) . '</td>
<td class="text-right text-danger">UGX ' . number_format($item['tax'], 2) . '</td>
<td class="text-right font-weight-bold">UGX ' . number_format($cumulative, 2) . '</td>
</tr>';
return ['html' => $carry['html'] . $row, 'total' => $cumulative];
}, ['html' => '', 'total' => 0])['html'] . '
</tbody>
</table>
</div>
</div>' : ''; 
?>

</body>
</html>
