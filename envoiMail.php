<?php
/* By Yaniv Afriat
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$tissuFiles = array('cotton' => 'cotton.txt', 'polyester' => 'polyester.txt', 'polyester' => 'tencel.txt', 'pu' => 'pu.txt', 'rayon' => 'rayon.txt', 'polyCotton' => 'polyCotton.txt', 'linen' => 'linen.txt', 'ramie' => 'ramie.txt', 'ameublement' => 'ameublement.txt');
//var_dump($tissuFiles);

include 'emailVerify.php';
$debug=true;
if (isset($_POST['tissu'])) {
    $body = $_POST['mail'];
    $subject = $_POST['subject'];
    $headers = 'From: yanivagent@gmail.com' . "\r\n" .
            'Reply-To: yanivagent@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    $emails = file_get_contents($_POST['tissu'] . '.txt');
    if ($emails) {
        $tabEmails = explode(";", $emails);
        foreach ($tabEmails as $email) {
            $error = validateEmail($email, true, true, 'yanivagent@gmail.com','',true);
            if ( $error == false) {
                $to = $email;
                if (mail($to, $subject, $body, $headers)) {
                    echo("<p>Message successfully sent to $email!</p>");
                    $fichierLogsV = fopen($_POST['tissu'] . 'LogValid.txt', 'a+');
                    fputs($fichierLogsV, $email . "\r\n");
                    fclose($fichierLogsV);
                } else {
                    echo("<p>Message delivery failed to $email...</p>");
                }
            } else {
                $fichierLogsE = fopen($_POST['tissu'] . 'LogError.txt', 'a+');
                fputs($fichierLogsE, $error.' '.$email . "\r\n");
                fclose($fichierLogsE);
            }
        }
    }
}
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <style>
            body { background: gray}
            #centrer table {margin-left: auto; margin-right: auto; width: 800px;background: white; padding: 15px; }
            label { text-align: right}
            h1 { text-align: center; color: whitesmoke}
            .right {text-align: right; padding-right: 10px;}
            #footer { bottom: 0px; position: fixed; height: 20px; background: black; opacity: 0.7; color: white;
                      width: 100%; left: 0px; text-align: right; padding:10px; }
            #footer span {margin-right: 50px;}
        </style>
    </head>
    <body >
        <h1>Formulaire contact de fournisseurs</h1>
        <form method="POST">
            <div id="centrer">
                <table>
                    <tr>
                        <td class="right">
                            <label>Type de tissu</label>
                        </td>
                        <td>
                            <select name="tissu" required="required">
                                <option value="">choisissez</option>
                                <option value="cotton">Cotton</option>
                                <option value="polyester">Polyester</option>
                                <option value="pu">PU Leather</option>
                                <option value="tencel">Tencel</option>
                                <option value="rayon">Rayon</option>
                                <option value="polycotton">Poly/Cotton</option>
                                <option value="linen">Linen</option>
                                <option value="ramie">Ramie</option>
                                <option value="ameublement">Ameublement</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">
                            <label>Sujet du mail a envoyé</label>
                        </td>
                        <td>
                            <select name="subject" required="required">
                                <option value="">choisissez</option>
                                <option value="quotation">Quotation</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">
                            <label>Le message</label>
                        </td>
                        <td>
                            <textarea name="mail" required="required" cols="50" rows="20"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="right">Joindre la signature</td>
                        <td><input type="radio" value="oui" name="signature" required="required"> Oui <input type="radio" value="non" name="signature"> NON</td>
                    </tr>
                    <tr>
                        <td><input type="reset" value="Tout effacé" /></td>
                        <td class="right"><input type="submit" value="Envoyé" /></td>
                    </tr>
                </table>
            </div>
        </form>
        <div id="footer"><span>By Yaniv Afriat</span></div>
    </body>
</html>