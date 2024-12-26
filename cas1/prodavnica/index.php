<?php
    
    $proizvodi = array(
        array(
            'id' => 1,
            'naziv' =>'Laptop',
            'cena' => 800
        ),
        array(
            'id' => 2,
            'naziv' =>'Mis',
            'cena' => 200
        ),
        array(
            'id' => 3,
            'naziv' =>'Slusalice',
            'cena' => 100
        ),
        array(
            'id' => 4,
            'naziv' =>'Tastatura',
            'cena' => 500
        ),
        array(
            'id' => 5,
            'naziv' =>'Televizor',
            'cena' => 1250
        ),
    );

    session_start();

    if(!isset($_SESSION['korpa'])) {
        $_SESSION['korpa'] = array();
    }

    if(isset($_GET['submit']) && $_GET['submit'] == 'Isprazni') {
        $_SESSION['korpa'] = array();
        $korpa = array();
    }

    if(isset($_POST['submit']) && $_POST['submit'] == 'Kupi') {
        $_SESSION['korpa'][] = $_POST['id'];
        header('Location: .');
        exit();  
    }

    if(isset($_GET["vidi_korpu"])) {
        /* 
            u _SESSION['korpa] se nalaze id od svih kliknutih proizvoda ako je pritisnut taster Kupi
            znaci moze biti:
            [0] 1,
            [1] 4,
            [2] 3,
            i tako dalje i tako dalje......
            verovatno treba da se prolazi kroz svaki deo niza ovde i ubacivati u skroz drugu promenljivu samo ti brojevi?
            vec postoje ti brojevi i oni su id u _session ili kako se vec zove
            i samo proveriti koji su ti id u sesiji['korpa'] i ubaciti
        */

        $ukupno = 0;
        $korpa = array();

        /*

            U _SESSION['korpa'] se nalaze identifikatori svih proizvoda na koje je pritisnuto Kupi
                Kako proveriti da li vec postoji taj idenfitikator koji sad prolazimo vec? 
                    I zapamtiti brojeve?
                        Mora za svaki da se zapamti broj



        foreach($_SESSION['korpa'] as $pr_u_Korpi) {
            // ovde sad imaju neki idenfitikator recimo 2,1,2,2,3,1,2
            foreach($proizvodi as $pr) {
                if($pr_u_Korpi == $pr['id']) {
                    echo $pr[(int)$pr['id']][3];
                    $pr[(int)$pr['id']][3]++;
                }

            }
        }

        
        foreach($_SESSION['korpa'] as $proizvodiUSesiji) {
            foreach($proizvodi as &$pr) {
                if($proizvodiUSesiji == $pr['id']) {
                    $pr['broj']++;
                }
            }
        }
        */

        foreach($_SESSION['korpa'] as $proizvodiUSesiji) {
            foreach($proizvodi as $pr) {
                if($proizvodiUSesiji == $pr['id']) {

                    if(count($korpa) == 0) {
                        $korpa[] = array(
                            'id' => $pr['id'],
                            'naziv' => $pr['naziv'],
                            'cena' => $pr['cena'],
                            'broj' => 1
                        ); 
                        $ukupno += $pr['cena'];
                    }
                    else {
                        $provereno = false;
                        foreach($korpa as &$krp_provera) {
                            if($proizvodiUSesiji == $krp_provera['id']) {
                                $krp_provera['broj']++;
                                $ukupno += $krp_provera['cena'];
                                $provereno = true;
                            }
                        }
                        if(!$provereno) {
                            $korpa[] = array(
                                'id' => $pr['id'],
                                'naziv' => $pr['naziv'],
                                'cena' => $pr['cena'],
                                'broj' => 1
                            ); 
                            $ukupno += $pr['cena'];
                        }
                    }
                    break;
                    
                    /*
                    $korpa[] = array(
                        'id' => $pr['id'],
                        'naziv' => $pr['naziv'],
                        'cena' => $pr['cena'],
                        'broj' => 0
                        );
                        
                        /* if($korpa['broj'] == 0) {
                            $korpa['broj']++;
                            } else {
                                $korpa['broj'] = 1;
                        } 
                        
                        $ukupno += $pr['cena'] * $pr['broj'];
                        break; */
                        
                }
            }
        }

        #var_dump($korpa);

        include "korpa.php";
        exit();
    } 

    include "katalog.php";

?>