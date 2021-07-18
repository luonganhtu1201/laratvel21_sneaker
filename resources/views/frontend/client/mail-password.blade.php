<table border="0" cellpadding="0" cellspacing="0" width="600" style="margin: 0 auto; background-color:#ffffff;border:1px solid #e5e5e5;border-radius:3px">
    <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0 auto;background-color:#333333;color:#202020;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;border-radius:3px 3px 0 0">
                    <tbody>
                        <tr>
                            <td style="padding:36px 48px;display:block">
                                <h1 style="font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:center;color:#ffffff;background-color:inherit">
                                    Change password Tun<span style="color: red">z</span> Sneaker
                                </h1>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr align="center" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border:1px solid #e5e5e5;border-radius:3px">
                <tbody>
                    <tr>
                        <td style="background-color:#ffffff" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td valign="top" style="padding:48px 48px 32px">
                                            <div style="color:#636363;font-size:14px;line-height:150%;text-align:left">
                                                <p style="margin:0 0 16px">Hello <strong>{{$details['name']}}</strong> ,</p>
                                                <p style="margin:0 0 16px">
                                                    You have recently requested a password reset at Tun<span style="color:red;">z</span> 's system. Here is a <a target="_blank" href="{{'http://tunzsneaker.com:8080/change-password?_token='.$details['token'].'&email='.$details['email']}}">link</a>
                                                    where you can change your password.
                                                </p>
                                                <p style="margin:0 0 16px">
                                                    <strong>Note : </strong> Do not provide links to any organization or individual. That will affect your personal interests.
                                                </p>
                                                <p style="margin:0 0 16px">We look forward to seeing you soon. Thanks you !</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>
    </tbody>
</table>
