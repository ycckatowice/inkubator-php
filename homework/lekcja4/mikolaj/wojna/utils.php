<?php

define('GAME_DECKS_FILE', 'game_decks.txt');

$cards = [
    ["power" => 2, "symbol" => "Dwa"],
    ["power" => 3, "symbol" => "Trzy"],
    ["power" => 4, "symbol" => "Cztery"],
    ["power" => 5, "symbol" => "Pięć"],
    ["power" => 6, "symbol" => "Sześć"],
    ["power" => 7, "symbol" => "Siedem"],
    ["power" => 8, "symbol" => "Osiem"],
    ["power" => 9, "symbol" => "Dziewięć"],
    ["power" => 10, "symbol" => "Dziesięć"],
    ["power" => 11, "symbol" => "Walet"],
    ["power" => 12, "symbol" => "Dama"],
    ["power" => 13, "symbol" => "Król"],
    ["power" => 14, "symbol" => "As"],
];


function prepareDeck(array $cards): array {


    $piks = prepareSet('Pik', $cards);
    $trefls = prepareSet('Trefl', $cards);
    $karos = prepareSet('Karo', $cards);
    $kiers = prepareSet('Kier', $cards);

    $deck = array_merge($piks, $trefls, $karos, $kiers);
    shuffle($deck);

    return $deck;
}

function prepareSet(string $setName, array $cards): array {
    return array_map(function($card) use($setName) {
        $card['set'] = $setName;
        return $card;
    }, $cards);
}

function getPlayerCard(array &$gameDecks, string $playerName): array {
    if (count($gameDecks[$playerName]) > 0) {
        $card = array_splice($gameDecks[$playerName], 0, 1);
        return $card[0];
    } else {
        exit("Player $playerName failed");
    }
}

function observeDeck(array $playerDeck, array $cards): string {
    $cardsCounter = [];
    foreach ($cards as $card) {
        foreach ($playerDeck as $deckCard) {
            if ($card['symbol'] == $deckCard['symbol']) {

                if(isset($cardsCounter[$card['symbol']])){
                    $cardsCounter[$card['symbol']] += 1;
                }else{
                    $cardsCounter[$card['symbol']] = 1;
                }
            }
        }
    }
    
    $result = '';

    foreach($cardsCounter as $counterName => $counterValue){
        $result .= $counterName. " x ". $counterValue. ", ";
    }
    
    return $result;
    
}

function initializeGame(array $cards): array {
    if (!file_exists(GAME_DECKS_FILE)) {
        $deck = prepareDeck($cards);

        $gameDecks = [
            'user' => array_slice($deck, 0, 26),
            'computer' => array_slice($deck, 26, 51),
            'stack' => []
        ];

        saveDeck($gameDecks);
    } else {
        $gameDecks = json_decode(file_get_contents(GAME_DECKS_FILE), true);
    }
    return $gameDecks;
}

function saveDeck(array $gameDecks): void {
    file_put_contents(GAME_DECKS_FILE, json_encode($gameDecks));
}
