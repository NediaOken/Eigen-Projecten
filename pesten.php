<?php
session_start();

$randomStapelKaart = rand(1,13);
$soort_kaart = ['schoppen', 'ruiten', 'harten', 'klaver'];
$p1 = '';
$turn = 'p1';
$aikaarten = [];

// AI
if(!isset($_SESSION['AI'])) {
    for ($teller = 0; $teller <= 5; $teller++) {

        $AI_Begin_kaart = rand(1, 13);
        $AI_Begin_Suit = $soort_kaart[array_rand($soort_kaart, 1)];

        $aikaarten[$AI_Begin_Suit] = $AI_Begin_kaart;
    }
    $_SESSION['AI'] = $aikaarten;
}
echo "<br/>";

// P1
if(!isset($_SESSION['P1_Kaarten']))
{
    for($teller=0;$teller<=5;$teller++)
    {
        $P1_Begin_kaart = rand(1,13);
        $P1_Begin_Suit = $soort_kaart[array_rand($soort_kaart,1)];

        $P1_Kaarten[] = "PlayingCards/" . $P1_Begin_Suit . "_" . $P1_Begin_kaart . ".png";
        $_SESSION['P1_Kaarten'] = $P1_Kaarten;
    }

    $P1KaartSuit = $soort_kaart[array_rand($soort_kaart, 1)];

    $StapelKaart = "PlayingCards/" . $P1KaartSuit . "_" . $randomStapelKaart . ".png";

    $_SESSION['stapel'] = $StapelKaart;
}

if(isset($_POST['pakken']))
{
    $random_kaart = rand(1,13);
    $StapelKaartSuit = $soort_kaart[array_rand($soort_kaart, 1)];
    array_push($_SESSION['P1_Kaarten'],"PlayingCards/" . $StapelKaartSuit . "_" . $randomStapelKaart . ".png");
}

if($turn == 'p1') {
    if (isset($_POST['kaart'])) {
        $p1 = $_POST['kaart'];

        $re = '/PlayingCards\/([a-z]{1,})_([0-9]{1,})/m';
        $str = $p1;

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

        $regix = '/PlayingCards\/([a-z]{1,})_([0-9]{1,})/m';
        $str = $_SESSION['stapel'];

        preg_match_all($regix, $str, $match, PREG_SET_ORDER, 0);

        if ($matches[0][1] == $match[0][1] || $matches[0][2] == $match[0][2]) {
            $_SESSION['stapel'] = $p1;
            $pos = array_search($p1, $_SESSION['P1_Kaarten']);
            unset($_SESSION['P1_Kaarten'][$pos]);
            $turn = 'ai';
        }
    }
}

if($turn == 'ai')
{
    $regix = '/PlayingCards\/([a-z]{1,})_([0-9]{1,})/m';
    $str = $_SESSION['stapel'];

    preg_match_all($regix, $str, $match, PREG_SET_ORDER, 0);

    $pos = array_key_exists($match[0][1], $aikaarten);
    echo $pos;
    echo $match[0][1] . "  |";
    /*
    if ( == $match[0][1] || $matches[0][2] == $match[0][2]) {
        $_SESSION['stapel'] = $p1;
        $pos = array_search($p1, $_SESSION['P1_Kaarten']);
        unset($_SESSION['P1_Kaarten'][$pos]);
    }
    */
    //print_r($_SESSION['AI']);
}

if(count($_SESSION['P1_Kaarten']) == 0)
{
    echo "JIJ WINT";
}
elseif(count($_SESSION['AI']) == 0)
{
    echo "AI WINT";
}
//var_dump($_SESSION);

echo $turn;
?>

<html>
<head>
</head>
<style>
    .kaart {
        width: 200px;
        height: 300px;

        margin-top: 50px;
    }
    .knop {
        border: 0 solid white;
        background: transparent;
    }
</style>
<body>
<form action='#' method="post">

<?php

// AI
foreach ($_SESSION['AI'] as $kaart_suit => $kaart_nummer)
{
?>
    <img class="kaart" src='PlayingCards/<?=$kaart_suit?>_<?=$kaart_nummer?>.png' />";
<?php
}
?>
<br/>

<button class="knop" name="pakken">
    <img class="kaart" src='PlayingCards/background.png' />
</button>
<img class="kaart" src='<?=$_SESSION['stapel']?>' />";
<br/>


// JIJ
    <?php
    foreach ($_SESSION['P1_Kaarten'] as $kaarten)
    {
    ?>
    <button class="knop" name="kaart" value="<?=$kaarten?>">
        <img class="kaart" src='<?=$kaarten?>'/>
    </button>
    <?php
    }
    ?>

</form>
</body>
</html>
