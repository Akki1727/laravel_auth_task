<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resend Pin</title>
</head>
<body>

<form action="" method="post">
@csrf
  <table border="1">
  <tr>
    <td>
      <label for="resendpin">Email for Resend Pin:</label>
    </td>
    <td>
      <input type="text" name="email" id="email">
    </td>
  </tr>
  </table>
  <input type="submit" value="submit" name="submit">
</form>
  
</body>
</html>