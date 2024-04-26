<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up for Student</title>
    <style>
    body {
        background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgmZ3DJ7z_ywr_1vKfCAlwtnlaWrWmtDuPtUtedt80VCpNat9rh2wqzpFcX8lpD8FYQY-MwvJVueZsaCEie4O5iYdCLqkTk1TJ4d62Oleq68FgUXD8pXqQ6YqqDsdyFG-cpVfOEXLEr8rE/s900/College.of.Computing.and.Artificial.jpg');
        /* Background image for student sign-up page */
        background-size: cover;
        background-position: center;
        color: rgb(30, 2, 2);
        /* Text color for better readability */
    }

    /* Styling for the input frame */
    .input-frame {
        max-width: 400px;
        /* Set maximum width for the frame */
        margin: 0 auto;
        /* Center the frame horizontally */
        background-color: rgba(255, 255, 255, 0.8);
        /* Semi-transparent white background */
        padding: 20px;
        /* Add padding inside the frame */
        border-radius: 10px;
        /* Add rounded corners */
    }

    /* Styling for the header */
    h1 {
        text-align: center;
        /* Center-align the text */
        margin-top: 10px;
        /* Add some top margin for spacing */
    }

    /* Styling for input container */
    .input-container {
        margin-bottom: 15px;
        /* Add space between input containers */
    }

    /* Styling for labels */
    label {
        display: block;
        /* Make labels display as blocks */
        font-size: 18px;
        /* Set font size for labels */
        margin-bottom: 5px;
        /* Add space below labels */
    }

    /* Styling for input fields */
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        /* Make input fields take full width */
        padding: 10px;
        /* Add padding for better appearance */
        font-size: 16px;
        /* Set font size for input fields */
        border: 1px solid #ddd;
        /* Add a light border */
        border-radius: 5px;
        /* Add rounded corners */
        background-color: #f6f6f6;
        /* Set background color */
        outline: none;
        /* Remove outline */
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #3b5998;
        /* Change border color on focus */
    }

    /* Styling for the signup link */
    .signup-button {
        display: inline-block;
        /* Make the link behave like a block */
        padding: 10px 20px;
        /* Add padding */
        background-color: #3b5998;
        /* Blue background color */
        color: white;
        /* Text color */
        text-decoration: none;
        /* Remove underline */
        border-radius: 5px;
        /* Add rounded corners */
        transition: background-color 0.3s;
        /* Add transition for smoother hover effect */
    }

    .signup-button:hover {
        background-color: #2a4887;
        /* Darker blue on hover */
    }

    /* Styling for logout button */
    .logout-button {
        position: absolute;
        /* Position absolute to position it in the top right corner */
        top: 20px;
        /* Distance from the top */
        right: 20px;
        /* Distance from the right */
        padding: 10px 20px;
        /* Add padding */
        background-color: #3b5998;
        /* Blue background color */
        color: white;
        /* Text color */
        border: none;
        /* Remove border */
        border-radius: 5px;
        /* Add rounded corners */
        cursor: pointer;
        /* Add cursor pointer */
        transition: background-color 0.3s;
        /* Add transition for smoother hover effect */
    }

    .logout-button:hover {
        background-color: #2a4887;
        /* Darker blue on hover */
    }
    </style>
</head>

<body>
    <div class="input-frame">
        <h1>Sign up for Student</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('index.store')}}">
            @csrf
            <div class="input-container">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="Name" placeholder="Enter your full name">
                @if (isset($error_filed) )    
                 <?php if (in_array("name" ,$error_filed)) echo " <h3> invalid name! </h3> " ; ?> <br />
                @endif
            </div>
            <div class="input-container">
                <label for="id">ID</label>
                <input type="text" id="id" name="Id" placeholder="Enter your ID">
                @if (isset($error_filed) )  
                  <?php if (in_array("id" ,$error_filed)) echo " <h3> invalid id! </h3> " ; ?> <br />
                @endif 
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="Email" placeholder="Enter your email">
                @if (isset($error_filed) )    
                  <?php if (in_array("email" ,$error_filed)) echo " <h3> invalid email! </h3> " ; ?> <br />
                @endif
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="Password" placeholder="Enter your password">
            </div>

            <!-- Changed the <a> tag to a <button> tag with appropriate class -->
            <button class="signup-button" name="signup">Sign Up</button>
        </form>

        <!-- Changed the <a> tag to a <button> tag with appropriate class -->
        <button class="logout-button" onclick="location = '/index'">Home</button>
        
    </div>
</body>

</html>