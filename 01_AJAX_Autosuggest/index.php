<!DOCTYPE html>
<html>
<head>
<title>Internship Search</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}
body{
    background:#f5f7fa;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}
.container{
    width:80%;
    max-width:900px;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}
h1{
    text-align:center;
    margin-bottom:20px;
}
.search-section{
    text-align:center;
}
select{
    padding:10px;
    width:250px;
}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}
th{
    background:#4a90e2;
    color:white;
    padding:10px;
}
td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}
</style>
</head>

<body>

<div class="container">

<h1>Internship Search Portal</h1>

<div class="search-section">
<select id="mode" onchange="showData()">
    <option value="">Select Mode</option>
    <option value="online">Online</option>
    <option value="onsite">Onsite</option>
    <option value="hybrid">Hybrid</option>
</select>
</div>

<div id="result"></div>

</div>

<script>
function showData()
{
    var mode=document.getElementById("mode").value;

    var xhr=new XMLHttpRequest();

    xhr.onreadystatechange=function()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            document.getElementById("result").innerHTML=xhr.responseText;
        }
    };

    xhr.open("GET","search.php?mode="+mode,true);
    xhr.send();
}
</script>

</body>
</html>
