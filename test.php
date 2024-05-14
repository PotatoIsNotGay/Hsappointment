<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Myanmar Time</title>
</head>
<body>
<p id="myanmar-time"></p>

<script>
function updateMyanmarTime() {
    var now = new Date();
    var options = {timeZone: 'Asia/Yangon', hour12: false};
    var myanmarTime = now.toLocaleString('en-US', options);
    document.getElementById("myanmar-time").innerHTML = "Current time in Myanmar is: " + myanmarTime;
}

// Update time every second
setInterval(updateMyanmarTime, 1000);

// Initial call to display time immediately
updateMyanmarTime();
</script>
</body>
</html>
