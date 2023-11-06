<?php
	// Couleurs disponibles pour les véhicules
	const CAR_COLORS = [
		'blue' => 'Bleu',
		'gray' => 'Gris',
		'yellow' => 'Jaune',
		'black' => 'Noir',
		'orange' => 'Orange',
		'deeppink' => 'Rose',
		'red' => 'Rouge',
		'green' => 'Vert'
	];
	// Liste des conducteurs disponibles pour la voiture 
	const CAR_DRIVERS = ['Arthur', 'Bastian', 'Evgenia', 'Jonathan', 'Maryline', 'Walid'];
	// Liste des conducteurs disponibles pour le camion
	const TRUCK_DRIVERS = ['Christiane', 'Ladislas', 'Philippe', 'Yann'];
	// Variables contenant le nombre d'éléments des tableaux
	$cmax = count(CAR_COLORS);
	$cdmax = count(CAR_DRIVERS);
	$tdmax = count(TRUCK_DRIVERS);
?>