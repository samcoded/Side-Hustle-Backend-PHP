<!DOCTYPE html>

<html>
	<head>
		<title>BASIC CALCULATOR - CodedSAM</title>
	</head>
	<body>
		<h1><b>BASIC CALCULATOR - CodedSAM </b></h1>
		<h2>Input numbers, pick operation from the dropdown menu and click Equals</h2>
			<?php
			// Retrieve submitted data from form
				if(isset($_POST['submit']))
				{
				// Declare Variables
$num1=$_POST['num1'];			
$num2=$_POST['num2']; 
$calc=$_POST['calc'];		
				// Check if data is numerical
				if(is_numeric($num1) && is_numeric($num2))
					{
					// Addition
						if($calc == 'plus')
						{
							$total = $num1 + $num2;
						}
						//Substraction
						if($calc == 'minus')
						{
							$total = $num1 - $num2;
						}
						// Multiplication
						if($calc == 'multiplied by')
						{
							$total = $num1 * $num2;	
						}
						// Division
						if($calc == 'divided by')
						{
							$total = $num1 / $num2;	
						}
						// Modulus
						if($calc == 'modulus')
						{
							$total = $num1 % $num2;	
						}
						// Display Results
						echo "<h1>{$num1} {$calc} {$num2} = {$total}</h1>";
					
					} else {
						
				// Error
						echo 'Error';
					
					}
				}
		
			?>
		    
		    // Form Data Collection
		    <form method="post" action="#">
		        <input name="num1" type="text"/>
		        <select name="calc">
		        	<option value="plus">Plus(+)</option>
		            <option value="minus">Minus(-)</option>
		            <option value="multiplied by">Multiply(*)</option>
		            <option value="divided by">Divide(/)</option>
				      <option value="modulus">Modulus(%)<option>
		        </select>
		        <input name="num2" type="text"/>
		        <input name="submit" type="submit" value="Equals(+)" />
		    </form>
	
	</body>
</html>