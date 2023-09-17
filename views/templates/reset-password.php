<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Nuevo mensaje</title>
    <style type="text/css">
           html {
        position: relative;
        font-size: 62.5%;
        box-sizing: border-box;
        height: 100%;
    }

    body {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        background-color:rgb(225, 213, 213);
        color: black;
        font-size: 1.6rem;
        font-family: Montserrat;
        margin: 0;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }
    h1,
    h2,
    h3,
    h4 {
        margin: 0 0 0;
        font-weight: 900;
        color: black;
        text-align: center;
    }

    h1 {
        font-size: 4rem;
        margin: 0 0 0 0;
    }

    h2 {
        margin: 0 0 0 0;
        font-size: 3.6rem;
    }

    h3 {
        font-weight: 700;
        font-size: 2.6rem;
        line-height: 1.25;
        margin: 0 0 1rem 0;
    }

    h4 {
        font-weight: 700;
        font-size: 2rem;
        line-height: 1.25;
    }

    p {
        color: black;
        font-size: 1.6rem;
        margin: 0 auto;
        text-align: center;
        line-height: 120%;

    }

    a {
        text-decoration: none;
        display: block;
        color: black;
        font-size: 1.6rem;

    }

    a:hover {
        cursor: pointer;
    }

    .contenedor {
        width: 95%;
        margin: 0 auto;
        background-color: #ffffff;
    }

    .border {
        border: 0.1rem solid black;
    }

    .linked-section {
        display: flex;
        width: 100%;
        margin: 0.5rem 0rem;
        flex-direction: column;
        align-items: center;
        padding: 0.8rem;
    }

    .a-btn-mail {

        padding: 1.4rem 0;
        color: #000000;
        width: 60%;
        text-align: center;
        border-radius: 1.2rem;
        background-color: orange;
        border: 0.1rem solid orange;
        font-weight: 600;
        outline: rgb(44, 44, 255) solid 0.1rem;
    }
    .a-btn-mail:hover
    {
        background-color: rgb(253, 176, 33);
        border: 0.1rem solid  rgb(253, 176, 33);
        outline: rgb(35, 35, 230) solid 0.2rem;
        opacity: 0.98;
        text-decoration: underline solid rgb(35, 35, 230);
    }

    .title-mail {
        color: #1C1E23;
        text-align: center;

        /* H1 */
        font-style: normal;
        font-weight: 500;
        line-height: 3.6rem;
        /* 124.138% */
        letter-spacing: -1px;
    }
    .footer
    {
        background-color: #fff;
    }
    .footer p,.footer td
    {
        margin: 0.2rem 0 0.2rem 0;
        color: #757d92;
        font-weight: 500;
    }
    .footer-enlaces,.footer-no-user
    {
        display: flex;
        color: #757d92;
        font-weight: 500;
        
    }
    .footer-enlaces a,.footer-no-user a
    {
        color: rgb(61, 61, 242);
        font-weight: 600;
    }
    .footer-no-user a
    {
        padding: 0rem 0.5rem;
    }
    .footer-enlaces a:nth-child(2)
    {
        border-right: 0.1rem solid #1C1E23;
        border-left: 0.1rem solid #1C1E23;
        padding: 0 0.5rem 0 0.5rem;
        margin: 0 0.5rem  0 0.5rem;
    }
    .header
    {
        background-color: #fff;
    }
    .main
    {
        border-top: 0.1rem solid #1C1E23;
        border-bottom: 0.1rem solid #1C1E23;
        background-color: rgb(244, 242, 242);
    }

        @media only screen and (max-width:600px) {

            p,
            a {
                line-height: 150% !important
            }

            h1,
            h1 a {
                line-height: 120% !important
            }

            h2,
            h2 a {
                line-height: 120% !important
            }

            h3,
            h3 a {
                line-height: 120% !important
            }

            h4,
            h4 a {
                line-height: 120% !important
            }

            h5,
            h5 a {
                line-height: 120% !important
            }

            h6,
            h6 a {
                line-height: 120% !important
            }

            h1 {
                font-size: 30px !important;
                text-align: center
            }

            h2 {
                font-size: 26px !important;
                text-align: left
            }

            h3 {
                font-size: 20px !important;
                text-align: left
            }

            h4 {
                font-size: 24px !important;
                text-align: left
            }

            h5 {
                font-size: 20px !important;
                text-align: left
            }

            h6 {
                font-size: 16px !important;
                text-align: left
            }
        }
    </style>
</head>

<body>
    <table class="contenedor">
        <td class="linked-section header">
            <h1 class="logo">CMCIO.XYZ</h1>
        </td>
        <tr class="main">
            <td class="linked-section">
                <h3 class="title-mail">Hola <?php echo $this->usuario;?> </h3>
                <p>Para restablecer el acceso a tu cuenta, Haz click en el siguiente boton:</p>
            </td>
            <td class="linked-section">
                <a class="a-btn-mail" href="<?php echo $_ENV['Project_URL']."/recuperar-cuenta?token=".$this->token; ?>">Restablece el acceso a tu cuenta</a>
            </td>
            <td class="linked-section">
                <p>Si no funciona el boton puedes copiar el siguiente enlace: <a href="<?php echo $_ENV['Project_URL']."/recuperar-cuenta?token=".$this->token; ?>"><?php echo $_ENV['Project_URL']."/recuperar-cuenta?token=".$this->token; ?></a> y pegarlo en tu navegador</p>
            </td>
        </tr>
        <td class="linked-section footer">
           <p>© cmcio.xyz,Todos los derechos recervados. </p>
           <p>¿Tienes dudas? Envia un correo a <span>contacto@cmcio.xyz</span></p>
           <p class="footer-enlaces"><a href="#">cmcio.xyz</a><a href="#">tienda.cmcio.xyz</a><a href="#">soporte.cmcio.xyz</a> </p>
           <p class="footer-no-user">No eres?  <?php echo $this->usuario;?>  :<a href="#">haz click</a>  para des-suscribirte</p>
        </td>
    </table>
</body>

</html>





recuperar-cuenta?token=