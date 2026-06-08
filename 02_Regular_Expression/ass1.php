<?php
$firstName = ""; $firstNameErr = "";
$middleName = ""; $middleNameErr = "";
$lastName = ""; $lastNameErr = "";
$email = ""; $emailErr = "";
$username = ""; $usernameErr = "";
$phone = ""; $phoneErr = "";
$aadhaar = ""; $aadhaarErr = "";
$pan = ""; $panErr = "";
$password = ""; $passwordErr = "";
$confirmPassword = ""; $confirmPasswordErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is required";
    } else {
        $firstName = trim($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
            $firstNameErr = "Only letters allowed";
        }
    }

    // Validate Middle Name (optional)
     if (empty($_POST["middleName"])) {
        $middleNameErr = "Middle Name is required";
    } else {
        $middleName = trim($_POST["middleName"]);
        if (!preg_match("/^[a-zA-Z]+$/", $middleName)) {
            $middleNameErr = "Only letters allowed";
        }
    }

    // Validate Last Name
    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last Name is required";
    } else {
        $lastName = trim($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
            $lastNameErr = "Only letters allowed";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Mobile Number is required";
    } else {
        $phone = trim($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneErr = "Invalid mobile number";
        }
    }

    // Validate Aadhaar
    if (empty($_POST["aadhaar"])) {
        $aadhaarErr = "Aadhaar Number is required";
    } else {
        $aadhaar = trim($_POST["aadhaar"]);
        if (!preg_match("/^[0-9]{12}$/", $aadhaar)) {
            $aadhaarErr = "Invalid Aadhaar number";
        }
    }

    // Validate PAN
    if (empty($_POST["pan"])) {
        $panErr = "PAN Number is required";
    } else {
        $pan = trim(strtoupper($_POST["pan"]));
        if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $pan)) {
            $panErr = "Invalid PAN number";
        }
}

    // Validate Username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = trim($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]{6,}$/", $username)) {
            $usernameErr = "Username must be at least 6 characters and can include letters, numbers, and underscores";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = trim($_POST["password"]);
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/", $password)) {
            $passwordErr = "Password must be at least 6 characters long and include uppercase, lowercase, number, and special character";
        }
    }

    // Validate Confirm Password
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Please confirm your password";
    } else {
        $confirmPassword = trim($_POST["confirmPassword"]);
        if ($confirmPassword !== $password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    // If no errors, set success message
    if (empty($firstNameErr) && empty($middleNameErr) && empty($lastNameErr) && empty($emailErr) && empty($phoneErr) && empty($aadhaarErr) && empty($panErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $successMsg = "Registration successful!";
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#FAF7F2;
    min-height:100vh;
    overflow-x:hidden;
}

.container{
    width:90%;
    max-width:1400px;
    margin:auto;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:60px;
    position:relative;
    padding:40px 0;
}

/* Background Text */

.bg-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    font-size:180px;
    font-weight:900;
    color:#000;
    opacity:.04;
    letter-spacing:10px;
    user-select:none;
    pointer-events:none;
}

/* LEFT SIDE */

.left{
    flex:1;
    position:relative;
    z-index:2;
}

.tag{
    display:inline-block;
    background:#FFE8DD;
    color:#C65D3B;
    padding:10px 20px;
    border-radius:50px;
    font-weight:600;
    margin-bottom:25px;
}

.left h1{
    font-size:65px;
    line-height:1.1;
    color:#1F2937;
    margin-bottom:20px;
}

.left p{
    color:#6B7280;
    line-height:1.8;
    font-size:18px;
    max-width:500px;
}

.features{
    margin-top:40px;
}

.features div{
    background:#fff;
    padding:16px 20px;
    margin-bottom:15px;
    border-left:5px solid #C65D3B;
    border-radius:12px;
    color:#374151;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

/* RIGHT SIDE */

.right{
    width:100%;
    max-width:650px;
    position:relative;
    z-index:2;
}

.form-box{
    background:#fff;
    padding:35px;
    border-radius:25px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.form-title{
    margin-bottom:25px;
}

.form-title h2{
    color:#1F2937;
    margin-bottom:8px;
}

.form-title p{
    color:#6B7280;
}

/* FORM */

.form-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:16px;
}

.input-box{
    display:flex;
    flex-direction:column;
}

.input-box label{
    margin-bottom:6px;
    font-size:14px;
    color:#374151;
    font-weight:600;
}

.input-box input{
    width:100%;
    padding:14px;
    border:1px solid #D1D5DB;
    border-radius:12px;
    outline:none;
    font-size:14px;
    transition:.3s;
}

.input-box input:focus{
    border-color:#C65D3B;
    box-shadow:0 0 0 4px rgba(198,93,59,0.12);
}

.full{
    grid-column:1/4;
}

/* Gender */

.gender{
    display:flex;
    gap:25px;
    margin-top:8px;
}

.gender label{
    font-weight:500;
    color:#374151;
}

/* Buttons */

.btn-area{
    margin-top:25px;
    display:flex;
    gap:15px;
}

.btn{
    flex:1;
    padding:14px;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
    transition:.3s;
}

.register{
    background:#C65D3B;
    color:#fff;
}

.register:hover{
    background:#b94f2d;
}

.reset{
    background:#ECECEC;
    color:#333;
}

.reset:hover{
    background:#dddddd;
}

/* RESPONSIVE */

@media(max-width:1000px){

.container{
    flex-direction:column;
}

.left h1{
    font-size:48px;
}

.bg-text{
    font-size:100px;
}

.right{
    max-width:100%;
}

}

@media(max-width:768px){

.form-grid{
    grid-template-columns:1fr;
}

.full{
    grid-column:auto;
}

.left h1{
    font-size:38px;
}

.gender{
    flex-direction:column;
    gap:10px;
}

}

@media(max-width:500px){

.form-box{
    padding:25px;
}

.bg-text{
    display:none;
}

}

.badge{
    position:absolute;
    top:20px;
    right:20px;
    background:#C65D3B;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.error{
    color:red;
    font-size:13px;
    margin-top:5px;
    display:block;
}

.success{
    color:green;
    font-size:15px;
    margin-top:15px;
    font-weight:bold;
}

</style>
</head>
<body>

<div class="badge">2026</div>
<div class="container">

<div class="bg-text">INTERNSHIP</div>

<!-- LEFT SECTION -->

<div class="left">

<div class="tag">
Student Internship Portal
</div>

<h1>
Build Your Career<br>
Start Your Journey
</h1>

<p>
Register yourself for internship opportunities and create your professional profile. Complete your registration and begin your career journey today.
</p>

<div class="features">

<div>
🎓 Student Internship Registration
</div>

<div>
💻 Professional Profile Creation
</div>

<div>
🚀 Internship Ready Account Setup
</div>

</div>

</div>

<!-- RIGHT SECTION -->

<div class="right">

<div class="form-box">

<div class="form-title">
<h2>Create Account</h2>
<p>Please fill all required details</p>
</div>

<form method="post">

<div class="form-grid">

<!-- Row 1 -->

<div class="input-box">
<label>
    First Name:
    <input type="text"  placeholder="Enter First Name"
           name="firstName"
           value="<?php echo htmlspecialchars($firstName); ?>">
    <span class="error"> <?php echo $firstNameErr; ?>
    </span>
</label>

</div>


<div class="input-box">
<label>Middle Name</label>
<input type="text" placeholder="Enter Middle Name"
       name="middleName"
       value="<?php echo htmlspecialchars($middleName); ?>">
       <span class="error"><?php echo $middleNameErr; ?></span> 
</div>

<div class="input-box">
<label>Last Name</label>
<input type="text" placeholder="Enter Last Name"
         name="lastName"
         value="<?php echo htmlspecialchars($lastName); ?>">
         <span class="error"><?php echo $lastNameErr; ?></span>
</div>

<!-- Row 2 -->

<div class="input-box">
<label>Email Address</label>
<input type="email" placeholder="Enter Email"
       name="email"
       value="<?php echo htmlspecialchars($email); ?>">
       <span class="error"><?php echo $emailErr; ?></span>
</div>

<div class="input-box">
<label>Contact Number</label>
<input type="text" placeholder="Enter Mobile Number"
       name="phone"
       maxlength="10"
       value="<?php echo htmlspecialchars($phone); ?>">
       <span class="error"><?php echo $phoneErr; ?></span>
</div>

<div class="input-box">
<label>City</label>
<input type="text" placeholder="Enter City" >

</div>

<!-- Gender -->

<div class="input-box full">

<label>Gender</label>

<div class="gender">

<label>
<input type="radio" name="gender">
Male
</label>

<label>
<input type="radio" name="gender">
Female
</label>

<label>
<input type="radio" name="gender">
Other
</label>

</div>

</div>

<!-- Aadhaar + PAN -->

<div class="input-box">
<label>Aadhaar Number</label>
<input type="text" placeholder="12 Digit Aadhaar"
       name="aadhaar"
       maxlength="12"
       value="<?php echo htmlspecialchars($aadhaar); ?>">
       <span class=
       "error"><?php echo $aadhaarErr; ?></span>
</div>

<div class="input-box">
<label>PAN Number</label>
<input type="text" placeholder="ABCDE1234F"
       name="pan"
        maxlength="10"
        style="text-transform:uppercase;"
       value="<?php echo htmlspecialchars($pan); ?>">
       <span class="error"><?php echo $panErr; ?></span>
</div>

<div class="input-box">
<label>Username</label>
<input type="text" placeholder="Create Username" name="username"
       value="<?php echo htmlspecialchars($username); ?>">
</div>

<!-- Password -->

<div class="input-box full">
<label>Password</label>
<input type="password" placeholder="Create Password"
         name="password">
         <span class="error"><?php echo $passwordErr; ?></span>
</div>

<div class="input-box full">
<label>Confirm Password</label>
<input type="password" placeholder="Re-enter Password"
            name="confirmPassword">
            <span class="error"><?php echo $confirmPasswordErr; ?></span>
</div>

</div>

<div class="btn-area">

<button type="submit" class="btn register">
Register
</button>

<button type="reset" class="btn reset">
Reset
</button>

</div>

</form>

<?php if(!empty($successMsg)) { ?>
        <p class="success"><?php echo $successMsg; ?></p>
    <?php } ?>


</div>

</div>

</div>

</body>
</html>
