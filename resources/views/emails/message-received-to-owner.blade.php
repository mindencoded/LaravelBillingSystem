<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Message Received from {{ env('APP_URL') }}</title>

    <style type="text/css">
    </style>
</head>

<body style="margin:0; padding:0; background-color:#F2F2F2;">
    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <td align="center" valign="top">

                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                        <tr>
                            <td align="center" valign="top">
                                <h1>Message Received from {{ env('APP_URL') }}.</h1>
                                <ul>
                                    <li>Email: {{ $messge->email }}</li>
                                    <li>Name: {{ $messge->name }}</li>
                                    <li>Message: {{ $messge->message }}</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
