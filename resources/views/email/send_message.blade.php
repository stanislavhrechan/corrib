<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Nová správa</title>
</head>

<body style="margin:0; padding:0; background:#f5f5f5; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Card -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#000; padding:20px; text-align:center;">
                            <h2 style="color:#fff; margin:0; font-size:20px;">
                                Nová správa
                            </h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:30px; color:#333; font-size:14px; line-height:1.6;">

                            <p style="margin:0 0 15px;">
                                <strong>Meno:</strong><br>
                                {{ $data['name'] }}
                            </p>

                            <p style="margin:0 0 15px;">
                                <strong>Email:</strong><br>
                                {{ $data['email'] }}
                            </p>

			   <p style="margin: 0 0 15px;""
			     <strong>Telefone cislo:</strong><br>
                             {{$data['phone']}}
		          </p>

                            <hr style="border:none; border-top:1px solid #eee; margin:20px 0;">

                            <p style="margin:0;">
                                <strong>Poschodie a byty, ktoré zaujali:</strong><br><br>
                                {{ $data['message_poshodie_byt'] }}
                            </p>

                            <p style="margin:0;">
                                <strong>Správa:</strong><br><br>
                                {{ $data['message'] }}
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f9f9f9; padding:15px; text-align:center; font-size:12px; color:#888;">
                            Tento email bol odoslaný z kontaktného formulára Corrib
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
