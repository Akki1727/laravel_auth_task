
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgotPassword Page</title>
</head>
<body>

<form action="{{ route('forgotpassword.store') }}" method="post">
    <div class="container">
        <table border="1">
            <tr>
                <td>
                    <Label>Enter Your Email:</Label>
                </td>
                <td>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
            
        </table>
    </div>
    <input type="submit" value="submit" name="submit">
</form>
    
</body>
</html>

