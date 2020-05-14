<!DOCTYPE html>
<html>
<head>
    
    <style>
        body{
            padding: 0px;
            margin:0px;
            padding-top:15px;
        }

        .main{
          
            width: 380px;
            
            margin: 50px auto;
            padding: 0px;

        }
        .header{
            background-color:	#00BFFF;
            display: inline-block;
            color:white;
            text-align: center;
            vertical-align: middle;
            width: 380px;
            height: 80px;
        }
        .mid{
            background-color: #eee;
            width: 380px;
            height: 200px;
           
            padding-top: 20px;
            
            
        }
        .myinput{
            width: 250px;
            height: 35px;
            display:block ;
            margin: 0px auto;
            padding-left: 5px;

        }
        .mybutton{
            width: 260px;
            
            height: 40px;
            display:block ;
            background-color: 	#00BFFF;
            color: white;
            margin: 0px auto;
            font-size: 20px;
            inset-inline: 40px ;

            border: none;
           
            text-decoration: none;
           
            cursor: pointer;
        }

    </style>

    <body>
        
        <div class ="main">
            <div class="header">
                <h1>Log in 123</h1>
            </div>
            <div class="mid">
                <form action="checklogin.php" method="post">
                    <input class="myinput" type="text" name="account" placeholder="account"><br>

                    <input class="myinput" type="password" name="password" placeholder="Password"><br>

                    <input class="mybutton" type="submit" value="Log in">

                </form>

            </div>
            
        </div>
    </body>



</head>
</html>