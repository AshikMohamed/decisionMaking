<?php

$data = [
"Rain" => isset($_POST["Rain"]),
"HeavyTraffic" => isset($_POST["HeavyTraffic"]),
"EarlyMeeting" => isset($_POST["EarlyMeeting"]),
"Strike" => isset($_POST["Strike"]),
"Appointment" => isset($_POST["Appointment"]),
"RoadConstruction" => isset($_POST["RoadConstruction"])
];

$json = json_encode($data);
$encoded = base64_encode($json);

$command = '"C:\\Users\\ashik\\anaconda3\\python.exe" "C:\\xampp\\htdocs\\gitworks\\decisionMaking\\decisionMaking.py" ' . $encoded;
$output = shell_exec($command);

$result = json_decode($output, true);

?>

<html>
<body>

<h2>AI Recommendation</h2>

<?php

if($result){

if($result["WFH"])
echo "<p>Work From Home</p>";

if($result["Drive"])
echo "<p>Drive</p>";

if($result["PublicTransport"])
echo "<p>Use Public Transport</p>";

}else{

echo "<p>Python did not return valid data.</p>";

}

?>

<br>
<a href="index.html">Try Another Scenario</a>

</body>
</html>