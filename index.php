<?php
/**
 * 1. Complétez la variable $html, elle devra contenir un texte court de newsletter.
 * 2. Ajoutez au moins une adresse mail ( la vôtre ? ) au tableau $to.
 * 3. Envoyez ce mail au format HTML à toutes les personnes de $ to qui ont souscrit à votre newsletter.
 * Bonus, pour chaque adresse mail indiquer si le mail a bien été envoyer, ou faire un tableau contenant les succès / erreurs et l'afficher après envoi
 *    ex: ['j.conan@fondationface.org' => true, 'toto@fondationface.org' => false] => à vous de trouver la suite !
 */



$html = '
    <html lang="fr">
        <head>
            <title>Newsletter</title>
        </head>
        <body>
            <h1>Le port d un masque chirurgical ou "grand public" de catégorie 1 est désormais requis</h1>
            <div>
                Il s agit d une autre conséquence de l émergence de plusieurs variants
                du virus. Compte tenu de l apparition de variants du Sars-CoV-2 potentiellement plus transmissibles,
                seuls les masques chirurgicaux ou les masques grand public de catégorie 1 peuvent être portés,
                indique le nouveau protocole sanitaire. Ces masques grand public sont destinés à des personnes en contact régulier avec le public,
                car ils filtrent au moins 90% des particules émises d une taille supérieure ou égale à 3 microns, précise le ministère de l Economie, 
                des Finances et de la Relance.

                Ces masques, à raison de deux par jour de présence dans les établissements scolaires, seront mis à la disposition des personnels
                en contact direct avec les élèves. Il est toutefois de la responsabilité des parents de fournir ces masques à leurs enfants.
                Afin que les familles puissent acquérir de nouveaux masques respectant ces exigences, un délai est accordé jusqu au 8 février 2021,
                précise le nouveau protocole. Le ministère fournira aux établissements un stock de masques pour les élèves, en cas d oubli ou d impossibilité d en avoir. 
            </div>
        </body>
    </html>
';

$to = [
    '',
    ''
];

$mail = "";
$sujet ="exo168";
$header = array(
    "from" => $mail,
    "Reply-To" => $mail,
    "X-Mailer" => 'PHP/' . phpversion(),
    'Content-type' => 'text/html; charset=iso-8859-1',
    'MIME-Version' => '1.0'
);
$file = fopen("mail.txt","a+b");

foreach ($to as $mail) {
    if (mail($mail, $sujet,$html, $header)) {
        echo "<p>Le message pour $mail a bien été envoyé. Merci !</p>";
        $token = 'true';
    }
    else {
        echo "<p>Une erreur est survenue lors de l'envoi du mail pour $mail</p>";
        $token = 'false';
    }
    fwrite($file,  $mail ." => ".$token."\r\n");
}
fclose($file);