<?php
 $pointUtilitariste = 0;


$question1 ='<strong>Un enfant frappe à votre porte et vous demande de le cacher parce qu\'un meurtrier le poursuit, vous acceptez. Peu après, le meurtrier frappe à votre porte et vous demande si vous avez cachez un enfant.</strong>';
$reponse1 = [
    'dire que vous avez caché un enfant.' => -5,
    'Mentir et dire que vous ne savez rien.' => 1
];
 $question2 ='<strong>Vous vous rendez au supermarché, ça y est, il est enfin là, le top des sièges massants, depuis des années vous vouliez l\'acheter et aujourd\'hui il est en promotion à un prix dérisoire, enfin 900 euros comme même, vous n\'y réfléchissez pas à deux fois vous l\'achetez. Sauf qu\'au moment de payer, sur la borne, il est écrit voulez-vous annuler votre achat et donner cet argent pour lutter contre la faim au Bangladesh vous pourrez suivre l\'impact de vos dons sur notre site, si je refuse ?
 </strong>
 <p>(C\'est une nouvelle loi française le message apparait pour chaque paiement. cette question ne compte pas dans le resultat final)</p>';
$reponse2 = [
    'Mon action est moralement mauvaise' => 0,
    'Mon action n\'est ni bonne, ni mauvaise' => 0 
];
 $question3 ='<strong>Vous rentrez chez vous quand une famille vous interpelle. "Bonjour nous sommes sans abri et nous n\'avons pas  manger depuis plusieurs jours", au même moment le coffre de voiture de votre voisin s\'ouvre avec 4 sacs de nourriture remplit, la famille n\'a pas remarquée et elle commenece à partir. </strong>
 <p>(Il n\'y aura aucune consèquence pour vous et votre vosin gagne bien sa vie)</p>';
$reponse3 = [
    'Je vole les sacs et les donne à la famille sans abri' => 1,
    'Je garde les sacs pour les rendre à son vrai propriètaire' =>-1
];
 $question4 ='<strong>Votre confiserie qui cartonne en ce moment a été envahie par des créatures appelées Gremlins. C\'est ce que vous dit un ami, ces créatures sont particulièrement dangereuses. Mais cet ami a l\'habitude de vous faire des blagues.
 Et si vous n\'ouvrez pas demain, des centaines de personnes seront déçues de ne pas recevoir leurs bonbons.</strong>
 <p>(Votre ami n\'est maintenant plus joignable)</p>';
$reponse4 = [
    'Je deçois des centaines personnes' => -1,
    'je demande à mon employé de faire l\'ouverture demain car je serai en retard' => 2
];
 $question5 ='<strong>vous demander à votre meilleur ami de réparer votre voiture, le prix convenu est de 300 euros.
 votre ami répare votre voiture et vous devez le payer.
 Cependant vous recevez un mail d\'altruisme efficace juste au même moment qui vous dit qu\'avec 300 euros pouvez acheter 30 moustiquaires ce qui sauverai environs 5 personnes et freinerai la propagation de maladie dans un paye d’Afrique pauvre.</strong>
 <p>(si vous ne payé pas votre ami, il ne sera pas faché et vous fera toujours confiance car c\'est votre meilleur ami)</p>';
$reponse5 = [
    'Je donne l\'argent à altruisme efficace.' => 1,
    'Je donne l\'argent à mon meilleur ami.' => -1
];
$question6 ='<strong>Sur une barque en perdition au millieu de l\'océan, vous êtes 5 cinqs personnes dont un bléssé qui moins a de 30% chance de suvivre plus un chien. 
pour que la barque ne chavirer pas il faut jeter un être vivant.</strong>
 <p>(ils sont tous dans un coma temporaire, auncune chance que quelqu\'un se reveille et il n\'y aura aucune conséquence pour vous, quand tout le monde aura repris conscient vous direz que vous la personne
  ou le chien avait déjà disparue à votre reveille)</p>';
$reponse6 = [
    'je sauve personne, l\'égalité c\'est important' => -1,
    'je jette la personne bléssée' => 1,
    'je jette le chien' => 0.5,
    'je jette une personne bien portante' => -0.5
]; 
$question7 ='<strong> Vous vous réveillez le matin et vous retrouvez dos à dos dans votre lit avec un violoniste inconscient. Un célèbre violoniste inconscient. On lui a diagnostiqué une maladie des reins mortelle; la Société des Mélomanes a examiné tous les dossiers médicaux disponibles et trouvé que vous seul avez le bon groupe sanguin pour le sauver. Ils vous ont donc enlevé la nuit dernière, et le système circulatoire du violoniste a été branché au vôtre, de sorte que vos reins peuvent être utilisés pour extraire les poisons de son sang ainsi que de votre propre sang. S\'il est débranché de vous désormais, il va mourir; mais dans neuf mois, il aura récupéré de sa maladie, et pourra en toute sécurité être débranché de vous</strong>
 ';
$reponse7 = [
    'Je laisse le violoniste accrocher 9 mois et je suspens ma vie' => 1,
    'J\'appelle la police et demande à ce que l\'on me décroche' => -1
];
 $question8 ='<strong>Vous êtes un médecin spécial qui gère les organes artificiels. Il se trouve qu\'exceptionnellement, il y a une pénurie d\'organes artificiels aujourd\'hui. En consultant le registre, vous voyez une personne dont la jambe est cassée, qui a cinq organes artificiels et qui est dans le coma.
 Vous pouvez lui prélever ces organes, sans aucune conséquence et personne ne le saura jamais, parce que la procédure implique de brûler les défunts.</strong>
 ';
$reponse8 = [
    'Commettre un meutre et sauver 5 vie',
    'Laisser les 5 personnes mourrir'
];
?>