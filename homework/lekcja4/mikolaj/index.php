<?php

require_once 'utils.php';

$gameDecks = initializeGame($cards);

$currentUserCard = getPlayerCard($gameDecks, 'user');
$currentComputerCard = getPlayerCard($gameDecks, 'computer');



$results = "<table>"
        . "<tr><td>User card: </td><td>{$currentUserCard['symbol']} {$currentUserCard['set']}</td><td></tr>"
        . "<tr><td>Computer card: </td><td>{$currentComputerCard['symbol']} {$currentComputerCard['set']}</td></tr>"
        . "</table>";

if ($currentUserCard['power'] > $currentComputerCard['power']) {

    $gameDecks['user'] = array_merge(
            $gameDecks['user'], [$currentUserCard, $currentComputerCard], array_splice($gameDecks['stack'], 0)
    );
    echo "<h1>User won</h1>";
} else if ($currentUserCard['power'] < $currentComputerCard['power']) {

    $gameDecks['computer'] = array_merge(
            $gameDecks['computer'], [$currentUserCard, $currentComputerCard], array_splice($gameDecks['stack'], 0)
    );
    echo "<h1>Computer won</h1>";
} else {

    $gameDecks['stack'] = array_merge($gameDecks['stack'], [
        $currentUserCard,
        getPlayerCard($gameDecks, 'user'),
        $currentComputerCard,
        getPlayerCard($gameDecks, 'computer')
    ]);
    echo "<h1> Tie</h1>";
}

saveDeck($gameDecks);

$sizeUserDeck = count($gameDecks['user']);
$sizeComputerDeck = count($gameDecks['computer']);
$userCardsWatch = observeDeck($gameDecks['user'], $cards);
$computerCardsWatch = observeDeck($gameDecks['computer'], $cards);


$decksSize = "<table>"
        . "<tr><td>User card sum: </td><td>{$sizeUserDeck}</td><td>$userCardsWatch</td></tr>"
        . "<tr><td>Computer sum: </td><td>{$sizeComputerDeck}</td><td>$computerCardsWatch</td></tr>"
        . "</table>";

echo $results . $decksSize;
