<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// VISITEUR
$routes->get('/', 'Visiteur::emploieDuTemps');
$routes->match(['get', 'post'], 'Connexion', 'Visiteur::connexion');
$routes->match(['get', 'post'], 'MotDePasseOublie', 'Visiteur::mdpOublie');
$routes->match(['get', 'post'], 'Planning', 'Visiteur::emploieDuTemps');
$routes->match(['get', 'post'], 'Planning/(:any)', 'Visiteur::emploieDuTemps/$1');


// CLIENT
$routes->group('', ['filter'=>'filtreclient'], static function($routes){

    $routes->match(['get', 'post'], 'Compte', 'Client::moncompte');
    $routes->match(['get', 'post'], 'ModifierCompte', 'Client::modifiecompte');
    $routes->match(['get', 'post'], 'NouveauMotDePasse', 'Client::nouveauMDP');

    $routes->match(['get', 'post'], 'PageReservation', 'Client::pagereservation');
    $routes->match(['get', 'post'], 'Reservation', 'Client::reserver');
    $routes->match(['get', 'post'], 'Reservation/(:any)', 'Client::reserver/$1');
    $routes->match(['get', 'post'], 'Reservation/(:any)/(:any)', 'Client::reserver/$1/2');
    $routes->match(['get', 'post'], 'Confirmation', 'Client::validerReservation');
    
    $routes->match(['get', 'post'], 'Abonnements', 'Client::abonnement');
});


//ADMINISTRATEUR
$routes->group('', ['filter'=>'filtreadmin'], static function($routes){
    $routes->match(['get', 'post'], 'Ajout', 'Administrateur::ajouterAdherent');
    $routes->match(['get', 'post'], 'Abonnement', 'Administrateur::ajouterAbonnement');
    $routes->match(['get', 'post'], 'JoursAdditionnels', 'Administrateur::ajouterTemps');
});