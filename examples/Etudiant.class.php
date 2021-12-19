<?php

namespace APP\Modules\Etudiant\Models;
use APP\Modules\Utilisateur\Models\Membre as Utilisateur;

// ATTENTION : ici il a été mis extends Utilisateur
// mais Utilisateur = Models\Membre !!!
class Etudiant extends Utilisateur
{
	/**
	 * Constructeur de la classe.
	 *
	 * @param  integer $nIdElement Id de l'élément.
	 *
	 * @return  void
	 */
	public function __construct($nIdElement = 0)
	{
		parent::__construct();

		$aMappingChamps = array(
			'id_etudiant' => 'nIdEtudiant',
			'numero_etudiant' => 'sNumeroEtudiant',
			'nom' => 'sNom',
			'nom_usage' => 'sNomUsage',
			"nom_liste" => "sNomListe",
			'prenom' => 'sPrenom',
			'prenom_usage' => 'sPrenomUsage',
			'prenom_liste' => 'sPrenomListe',
			'prenom_complementaire' => 'sPrenomComplementaire',
			'ine' => 'sIne',
			'email_cnsmd' => 'sEmailCnsmd',
			'naissance_date' => 'dNaissanceDate',
			'naissance_date_formate' => 'dNaissanceDateFormate',
			'naissance_code_postal' => 'sNaissanceCodePostal',
			'naissance_ville' => 'sNaissanceVille',
			'naissance_pays_id' => 'sNaissancePays',
			'nationalite_id' => 'sNationalite',
			'bac_obtenu' => 'nBacObtenu',
			'bac_annee' => 'nBacAnnee',
			'bac_section' => 'sBacSection',
			'bac_departement' => 'sBacDepartement',
			'etablissement_en_cours' => 'sEtablissementEnCours',
			'dernier_diplome_type' => 'sDernierDiplomeType',
			'situation_annee_precedente' => 'sSituationAnneePrecedente',
			'etudes_etablissement' => 'sEtudesEtablissement',
			'etudes_ville' => 'sEtudesVille',
			'etudes_pays_id' => 'sEtudesPays',
			'etudes_pays_formate' => 'sEtudesPaysFormate',
			'etudes_diplome' => 'sEtudesDiplome',
			'etudes_diplome_annee' => 'sEtudesDiplomeAnnee',
			'code_metier_parent_1' => 'sCodeMetierParent1',
			'code_metier_parent_2' => 'sCodeMetierParent2',
			'sexe_parent_1' => 'sSexeParent1',
			'sexe_parent_2' => 'sSexeParent2',
			'situation_pro_etudiant' => 'sSituationProEtudiant',
			'naissance_ville_id' => 'sNaissanceVilleId',
			'civilite_etudiant'	=>	'sCivilite',
			'bourse_type' => 'sTypeBourse',
			'bourse_echelon' => 'sBourseEchelon',
			'bourse_type_formate' => 'sTypeBourseFormate',
			'bourse_echelon_formate' => 'sBourseEchelonFormate',
			'formation_activite_pro' => 'sFormationActivitePro',
			'formation_financeur' => 'sFormationFinanceur',
			'formation_financeur_ville' => 'sFormationFinanceurVille',
			'formation_pro_dispositif' => 'sFormationProDispositif',
			'cvec_numero_attestation' => 'sCvecNumeroAttestation',
			'cvec_nom' => 'sCvecNom',
			'insc_adm_obligatoire' => 'nInscAdmObligatoire',
			'insc_adm_obligatoire_formate' => 'nInscAdmObligatoire_formate',
			'insc_adm_etat' => 'nInscAdmValide',
			'autorisation_parentale' => 'nAutorisationParentale',
			'derniere_modif_date' => 'dtDerniereModifDate',
			'derniere_modif_date_formate' => 'dtDerniereModifDateFormate',
			'derniere_modif_identifiant' => 'sDerniereModifIdentifiant',
			'insc_adm_etat_date' => 'nInscAdmEtatDate',
			'insc_adm_etat_date_formate' => 'nInscAdmEtatDateFormate',
			'insc_adm_etat_info' => 'sDescriptionEtatInfo',
			'insc_adm_montant' => 'nInscAdmMontant',
			'insc_adm_montant_sco' => 'nInscAdmMontantSco',
			'insc_adm_montant_peda' => 'nInscAdmMontantPeda',
			'insc_adm_montant_media' => 'nInscAdmMontantMedia',
			'insc_adm_paiement_autorise' => 'nInscAdmPaiementAutorise',
			'insc_adm_paiement_valide' => 'nInscAdmPaiementValide',
			'insc_adm_cas_particulier' => 'nInscAdmCasParticulier',
			'nom_scene' => 'sNomScene',
			'etablissement_rattachement' => 'sEtablissementRattachement',
            'libelle_cursus_carte_etudiant' => 'sLibelleCursusCarteEtudiant',

			'id_parametre' => 'nIdParametre',
			'type'	=>	'sTypeParametre',
			'code'	=>	'nCodeParametre',
			'valeur'	=>	'sValeurParametre',

			'id_coordonnee'	=> 'nIdCoordonnee',
			'type' => 'sTypeCoordonnee',
			// 'nom_prenom' => 'sNomPrenomCoordonne',
			'email' => 'sEmailCoordonnee',
			'tel' => 'nTelephoneCoordonne',
			'adresse' => 'sAdresseCoordonnee',
			'code_postal' => 'nCodePostalCoordonnee',
			'pays'	=>	'sPaysCoordonnee',
			'ville' => 'sVilleCoordonnee',
			'complement' => 'sAdresseCoordonneeComplement',
			'complement_autre' => 'sAdresseCoordonneeComplementAutre',
			'personne_a_prevenir'	=> 'nPersonneAPrevenir',

			'id_commune' => 'id',
			'commune' => 'text',

			'id_commentaire' => 'nIdCommentaire',
			'identifiant' => 'sIdentifiant',
			'date_saisie' => 'sDateSaisie',
			'sortie_date' => 'dSortieEtudiantDate',
			'sortie_date_formate' => 'dSortieEtudiantDateFormate',
			'type_etudiant' => 'sTypeEtudiant',
			'type' => 'nTypeCommentaire',
			'visible_etudiant' => 'nVisibiliteEtudiant',
			'visible_enseignant' => 'nVisibiliteProfesseur',
			'id_document' => 'nIdDocument',

			'archive' => 'nArchive',
			'archive_formate' => 'nArchiveFormate',
			'archive_date' => 'dArchiveDate',
			'archive_date_formate' => 'dArchiveDateFormate',

			'id_planning_enseignant_discipline_creneau' => 'nIdCreneau',
			'cursus' =>'sCursus',
			'annee' => 'sAnnee',
			'categorie_discipline' => 'sCategorieDiscipline',
			'cycle' => 'sCycle'

		);

		$this->aMappingChamps = array_merge($this->aMappingChamps, $aMappingChamps);
		
		$this->aTitreLibelle = array("nom_liste", "prenom_liste");
		$this->sNomCle = "id_etudiant";

		if ($nIdElement > 0) {
			$aRecherche = array('nIdEtudiant' => $nIdElement);
			$aElements = $this->aGetElements($aRecherche);
			if (isset($aElements[0]) === true) {
				foreach ($aElements[0] as $szCle => $szValeur) {
					$this->$szCle = $szValeur;
				}
			}
		}
	}


	/**
	 * Requête de sélection.
	 *
	 * @param array $aRecherche Critères de recherche
	 * @param string $szOrderBy Tri
	 * @param boolean $bModeCount Juste compter.
	 *
	 * @return string			   Retourne la requête
	 */
	public function szGetSelect($aRecherche = array(), $szOrderBy = '', $bModeCount = false, $nStart = 0, $nNbElements = 0, $szGroupBy = '', $sContexte = '')
	{
		if ($bModeCount === false) {
			$szChamps = "
                ETU.id_etudiant, ETU.numero_etudiant, ETU.nom, ETU.nom_usage, IF(IFNULL(ETU.nom,'')=IFNULL(ETU.nom_usage,''), ETU.nom, IF(IFNULL(ETU.nom_usage, '')='', ETU.nom, CONCAT(ETU.nom, ' (', ETU.nom_usage, ')')))  AS nom_liste,
                ETU.prenom, ETU.prenom_usage, IF(IFNULL(ETU.prenom_usage, '') = '', ETU.prenom, ETU.prenom_usage) AS prenom_liste,
                ETU.prenom_complementaire, ETU.ine, ETU.email_cnsmd, ETU.naissance_date, DATE_FORMAT(ETU.naissance_date, '%d/%m/%Y') AS naissance_date_formate,
                ETU.naissance_code_postal, ETU.naissance_ville, ETU.bourse_type, ETU.bourse_echelon, ETU.naissance_pays_id, ETU.nationalite_id,
                ETU.bac_obtenu, ETU.bac_annee, ETU.bac_section, ETU.bac_departement, ETU.etablissement_en_cours, ETU.dernier_diplome_type,
                ETU.situation_annee_precedente, ETU.etudes_etablissement, ETU.etudes_ville, ETU.etudes_pays_id, ETU.etudes_diplome,
                ETU.etudes_diplome_annee, ETU.code_metier_parent_1, ETU.code_metier_parent_2, ETU.sexe_parent_1, ETU.sexe_parent_2,
                ETU.situation_pro_etudiant, ETU.id_utilisateur, ETU.naissance_ville_id, ETU.id_etudiant AS nIdElement, ETU.sortie_date, DATE_FORMAT(ETU.sortie_date, '%d/%m/%Y') AS sortie_date_formate,
                ETU.civilite AS civilite_etudiant, ETU.formation_activite_pro, ETU.formation_financeur, ETU.formation_financeur_ville, ETU.formation_pro_dispositif,
                ETU.cvec_numero_attestation, ETU.cvec_nom, ETU.insc_adm_etat, ETU.autorisation_parentale, ETU.archive,ETU.archive_date, IF(ETU.archive_date IS NULL, '', DATE_FORMAT(ETU.archive_date, '%d/%m/%Y')) AS archive_date_formate ,
                ETU.derniere_modif_date, DATE_FORMAT(ETU.derniere_modif_date, '%d/%m/%Y à %H\h%i') AS derniere_modif_date_formate,
                ETU.derniere_modif_identifiant, ETU.insc_adm_etat_date, IF(ETU.insc_adm_etat_date IS NULL, '', DATE_FORMAT(ETU.insc_adm_etat_date, '%d/%m/%Y à %H\h%i')) AS insc_adm_etat_date_formate,
                insc_adm_etat_info, PAR_INSC_ETAT.code AS sStatutInscriptionCode, PAR_INSC_ETAT.valeur AS sStatutInscription, (CASE WHEN ETU.bac_obtenu = 1 THEN 'Oui' ELSE 'Non' END) AS nBacObtenuFormate,
                ETU.nom_scene, ETU.etablissement_rattachement, ETU.libelle_cursus_carte_etudiant, ETU.insc_adm_obligatoire, (CASE WHEN ETU.insc_adm_obligatoire = 1 THEN 'Oui' ELSE 'Non' END) AS insc_adm_obligatoire_formate,
                ETU.insc_adm_montant, ETU.insc_adm_montant_sco, ETU.insc_adm_montant_media, ETU.insc_adm_montant_peda, ETU.insc_adm_paiement_autorise, ETU.insc_adm_cas_particulier, ETU.insc_adm_paiement_valide
			";

			if ($sContexte == 'inscription_administrative' || $sContexte == 'export') {
				$oParametre = $this->oNew('Parametre');
				$sCodeAnnee = $oParametre->mGetParamValue('scolarite', 'code_annee');
			}
			if ($sContexte == 'inscription_administrative') {
				$szChamps .= ", IF(IFNULL((SELECT MAX(id_document) FROM document DOC WHERE DOC.id_etudiant=ETU.id_etudiant AND code='certificat_scolarite' AND code_annee='".$sCodeAnnee."'), 0) > 0, 'oui', 'non') AS bCertificatScolarite";
			}

			if ($sContexte == "excel" || $sContexte == "export" || $sContexte == "word") {
				$szChamps .= ", ECU.nom AS cursus, PAR1.valeur AS cycle, PAR2.valeur AS annee, (SELECT MAX(CONCAT(nom, ' ', prenom, ' ', tel, ' ', email)) FROM coordonnee WHERE ETU.id_etudiant=coordonnee.id_etudiant AND coordonnee.personne_a_prevenir=1) AS sPersonneAPrevenir
				";
			}

			if ($sContexte == "excel" || $sContexte == "export" || $sContexte == "word") {
				$szChamps .= ", CO.tel
				";
			}

			if ($sContexte == "excel" ) {
				$szChamps .= ", PAR3.valeur AS categorie_discipline
				";
			}

			if ($sContexte == "export") {
				$szChamps .= ", CONCAT(IFNULL(CO2.nom,''), ' ', IFNULL(CO2.prenom,'')) AS sNomPrenomCoordonne, CO.adresse AS sAdresse, CO.complement AS sAdresseComplement, CO.complement_autre AS sAdresseComplementAutre, CO.ville AS sVille, CO.code_postal AS sCodePostal, PAYS_COORD.valeur AS sPays, IF(IFNULL(ETU.insc_adm_paiement_valide, 0)=0, 'non', 'oui') AS nInscAdmPaiementValideFormate  , ECU.memoire_discipline AS sMemoireDiscipline, DEP.nom AS sDepartement, DISP.nom AS sDisciplinePrincipale, CONCAT(IFNULL(ENSCL.nom, ''), ' ', IFNULL(ENSCL.prenom, '')) AS sProfesseur, ECU.memoire_titre AS sMemoireTitre, ECU.memoire_referent AS sMemoireReferent, PAR.valeur AS sTypeEtudiantFormate, ECU.id_etudiant_cursus, GROUP_CONCAT(DISTINCT PARETI.valeur ORDER BY PARETI.code SEPARATOR ',') AS sEtiquette, ECU.nom AS sCursus, EGR.nom AS sGroupe, ECU.diplome_discipline_artistique AS sDiplomeDisciplineArtistique, PCS.valeur AS sStatutCursus, ECU.code_annee_en_cours AS sCodeAnneeEnCours, PDL.valeur AS sDiplomeLibelle, PDS.valeur AS sDiplomeSpecialite, PDC.valeur AS sDiplomeChamp, IF(ECU.diplome_date, DATE_FORMAT(ECU.diplome_date, '%d/%m/%Y'), '') AS dDiplomeDate, IF(ECU.date_entree, DATE_FORMAT(ECU.date_entree, '%d/%m/%Y'), '') AS dDateEntree, IF(ECU.date_fin, DATE_FORMAT(ECU.date_fin, '%d/%m/%Y'), '') AS dDateFin, LEFT(TRIM(IFNULL(ETU.naissance_code_postal,'')), 2) AS sDepartementNaissance,
					IF(IFNULL(CO2.officielle,0)=0, 'non', 'oui') AS bCo2AdresseOfficielle, CONCAT(IFNULL(CO2.nom,''), ' ', IFNULL(CO2.prenom,'')) AS sCo2NomPrenom, CO2.type AS sCo2Type, CO2.adresse AS sCo2Adresse, CO2.complement_autre AS sCo2ComplementAutre, CO2.complement AS sCo2Complement, CO2.email AS sCo2Email, CO2.tel AS sCo2Telephone, CO2.code_postal AS sCo2CodePostal, CO2.ville AS sCo2Ville, CO2PAYS.valeur AS sCo2Pays, CO2.id_coordonnee, 
						IF(IFNULL(PLANET.validation_etudiant,0)=0, 'non', 'oui') AS bIpValideeEtudiant,
						IF(IFNULL(PLANET.validation_gestionnaire,0)=0, 'non', 'oui') AS bIpValideeGestionnaire, IF(ETU.insc_adm_etat_date IS NULL, '', DATE_FORMAT(ETU.insc_adm_etat_date, '%d/%m/%Y')) AS dInscAdmEtatDateFormateSimple,
						ETU.insc_adm_etat_date AS dInscAdmEtatDate,
						PA_COM_INSEE.code_insee sCodeInsee,
						IFNULL(ETU.naissance_ville, '') sNaissanceVille,
						PA_PAYS_INSEE.valeur sNomPaysNaissance,
						IF(ECU.diplome_obtenu, 'oui', 'non') AS sDiplomeObtenu, IF(ECU.formation_articulee, 'oui', 'non') AS sFormationArticulee,
						(CASE WHEN ETU.insc_adm_obligatoire = 1 THEN 'Oui' ELSE 'Non' END) AS nInscAdmObligatoireFormate
				";
			}
			if ($sContexte == "word" ) {
				$szChamps .= ", IF(IFNULL(ETU.insc_adm_paiement_valide, 0)=0, 'non', 'oui') AS nInscAdmPaiementValideFormate, PAR.valeur AS sTypeEtudiantFormate, GROUP_CONCAT(DISTINCT PARETI.valeur ORDER BY PARETI.code SEPARATOR ',') AS sEtiquette,
					CO.adresse AS sAdresse, CO.complement AS sAdresseComplement, CO.complement_autre AS sAdresseComplementAutre, CO.ville AS sVille, CO.code_postal AS sCodePostal, PAYS_COORD.valeur AS sPays
				";
			}

			if ((!isset($aRecherche["bModeListe"]) || (!$aRecherche["bModeListe"])) || $sContexte == "export") {
				$szChamps .= ", CO.email, COM.id_commentaire, COM.identifiant, COM.date_saisie, COM.type, COM.visible_enseignant, COM.visible_etudiant, COM.valeur, PAR.code AS sTypeEtudiant, PA_PAYS_INSEE.valeur AS sNaissancePaysEtudiant, PA_NAT_INSEE.valeur AS sNationaliteEtudiant, IFNULL(PA_COM_INSEE.commune, ETU.naissance_ville) AS sCommuneEtudiant, DOC.id_document, PA_BOURSE_TYPE.valeur AS bourse_type_formate, PA_BOURSE_ECHELON.valeur AS bourse_echelon_formate, PAR_CAT_SOC_PARENT_1.valeur AS sParent1Cat, PAR_CAT_SOC_PARENT_2.valeur AS sParent2Cat, PA_PAYS_ETUDE.valeur AS etudes_pays_formate";
			}
			// if (isset($aRecherche['bJointureUtilisateur']) === true) {
				$szChamps .= ", UTI.actif, UTI.emailing";
			// }

		} else {
			$szChamps = "
				COUNT(*) AS nNbElements
			";
		}
		$sRequete = "
			SELECT *
			FROM
			(
				SELECT ".$szChamps."
				FROM etudiant AS ETU
			";
			
			$sRequete .= "LEFT JOIN parametre PAR_INSC_ETAT ON (PAR_INSC_ETAT.code = ETU.insc_adm_etat AND PAR_INSC_ETAT.type='insc_adm_etat')";

		if (!isset($aRecherche["bModeListe"]) || (!$aRecherche["bModeListe"]) || $sContexte == 'excel' || $sContexte == "export" || $sContexte == "word") {
			$sRequete .= "
					LEFT JOIN coordonnee AS CO ON(CO.id_etudiant = ETU.id_etudiant AND CO.type='principal')
					LEFT JOIN commentaire AS COM ON(COM.id_etudiant = ETU.id_etudiant)
					LEFT JOIN parametre PAR ON (PAR.code = ETU.type AND PAR.`type`='etudiant_type')
					LEFT JOIN etudiant_cursus ECU ON (ECU.id_etudiant = ETU.id_etudiant) 
					LEFT JOIN etudiant_cursus_tag ECT ON (ECU.id_etudiant_cursus=ECT.id_etudiant_cursus)
					LEFT JOIN param_pays_insee PA_PAYS_INSEE ON (PA_PAYS_INSEE.id_pays = ETU.naissance_pays_id)
					LEFT JOIN param_pays_insee PA_NAT_INSEE ON (PA_NAT_INSEE.id_pays = ETU.nationalite_id)
					LEFT JOIN param_commune_insee PA_COM_INSEE ON (PA_COM_INSEE.id_commune = ETU.naissance_ville_id)
					LEFT JOIN param_pays_insee PA_PAYS_ETUDE ON (PA_PAYS_ETUDE.id_pays = ETU.etudes_pays_id)
					LEFT JOIN parametre PA_BOURSE_TYPE ON (PA_BOURSE_TYPE.code = ETU.bourse_type AND PA_BOURSE_TYPE.`type`='bourse_type')
					LEFT JOIN parametre PA_BOURSE_ECHELON ON (PA_BOURSE_ECHELON.code = ETU.bourse_echelon AND PA_BOURSE_ECHELON.`type`='bourse_echelon')
					LEFT JOIN document DOC ON (DOC.type = 'photo_identite' AND DOC.numero_etudiant = ETU.numero_etudiant)
					LEFT JOIN parametre PAR_CAT_SOC_PARENT_1 ON (PAR_CAT_SOC_PARENT_1.id_parametre = ETU.code_metier_parent_1)
					LEFT JOIN parametre PAR_CAT_SOC_PARENT_2 ON (PAR_CAT_SOC_PARENT_2.id_parametre = ETU.code_metier_parent_2)
				";
		}

		if ($sContexte == 'excel' || $sContexte == "export" || $sContexte == "word") {
			$sRequete .= "
			LEFT JOIN parametre PAR1 ON ECU.cycle=PAR1.code AND PAR1.type='cursus_cycle'
			LEFT JOIN parametre PAR2 ON ECU.annee_en_cours=PAR2.code AND PAR2.type='cursus_grille_annee'
			";
		}

		if ($sContexte == 'excel') {
			$sRequete .= "
			LEFT JOIN etudiant_cursus_grille  ECG ON ECU.id_etudiant_cursus = ECG.id_etudiant_cursus
			LEFT JOIN etudiant_cursus_grille_discipline ECGD ON ECG.id_etudiant_cursus_grille=ECGD.id_etudiant_cursus_grille
			LEFT JOIN parametre PAR3 ON ECGD.categorie=PAR3.code AND PAR3.type='cursus_grille_discipline_categorie'
			";
		}

		if ($sContexte == 'export') {
			$sRequete .= "
			LEFT JOIN coordonnee AS CO2 ON CO2.id_etudiant = ETU.id_etudiant AND CO2.officielle=1
			LEFT JOIN param_pays_insee CO2PAYS ON CO2.pays_id=	CO2PAYS.id_pays
			LEFT JOIN discipline DISP ON ECU.id_discipline=DISP.id_discipline
			LEFT JOIN departement DEP ON DISP.id_departement=DEP.id_departement
			LEFT JOIN classe_enseignant CLAE ON ECU.id_classe=CLAE.id_classe
			LEFT JOIN enseignant ENSCL ON CLAE.id_enseignant=ENSCL.id_enseignant
			LEFT JOIN etudiant_groupe EGR ON EGR.id_etudiant_groupe=ECU.id_etudiant_groupe
			LEFT JOIN parametre PCS ON ECU.statut=PCS.code AND PCS.type='etudiant_cursus_statut'
			LEFT JOIN parametre PDL ON ECU.diplome_libelle=PDL.code AND PDL.type='diplome_libelle'
			LEFT JOIN parametre PDS ON ECU.diplome_specialite=PDS.code AND PDS.type='diplome_specialite'
			LEFT JOIN parametre PDC ON ECU.diplome_champ=PDC.code AND PDC.type='diplome_champ'
			LEFT JOIN planning_etudiant PLANET ON PLANET.id_etudiant_cursus=ECU.id_etudiant_cursus AND PLANET.code_annee_en_cours='".$sCodeAnnee."'
			";
		}
		if ($sContexte == 'word' || $sContexte == 'export') {
			$sRequete .= "
				LEFT JOIN param_pays_insee PAYS_COORD ON (PAYS_COORD.id_pays = CO.pays_id)
			";
		}
		if ($sContexte == 'export' || $sContexte == 'word') {
			$sRequete .= "
				LEFT JOIN parametre PARETI ON ECT.tag=PARETI.code AND PARETI.type='etudiant_cursus_tag'
			";
		}

		// if ($sContexte == 'creneau') {
		// 	$sRequete .= "
		// INNER JOIN etudiant_cursus_grille ECG ON ECU.id_etudiant_cursus=ECG.id_etudiant_cursus
		// INNER JOIN etudiant_cursus_grille_discipline ECGD ON ECG.id_etudiant_cursus_grille=ECGD.id_etudiant_cursus_grille";
		// }
		
		// if (isset($aRecherche['bJointureUtilisateur']) === true) {
			$sRequete .= "
				INNER JOIN utilisateur AS UTI ON(UTI.id_utilisateur = ETU.id_utilisateur)
			";
		// }
		
		$sRequete .= "
				WHERE 1=1
		";
		$sRequete .= $this->szGetCriteresRecherche($aRecherche, $sContexte);
		if ($sContexte == "export") {
			$sRequete .= " GROUP BY  ".$szGroupBy;
		}
		$sRequete .= "
			) matable 
		";
		
		if ($bModeCount === false) {
			if ($sContexte == "export") {
				$sRequete .= " GROUP BY  ".str_replace('CO2.', '', $szGroupBy);
			} else {
				$sRequete .= " GROUP BY id_etudiant ";
			}
			if ($szOrderBy != '') {
				if (substr($szOrderBy, 0, 13) == "insc_adm_etat") {
					$szOrderBy .= ", nom_usage ASC";
				}
				$sRequete .= " ORDER BY ".$szOrderBy;
			} else {
				$sRequete .= " ORDER BY id_etudiant DESC";
			}
		}

		// die($sRequete);
		// echo $sRequete."\r\n";
		// file_put_contents('data/etudiant'.date('his').'.txt', $sRequete);
		
		return $sRequete;
	}


	/**
	 * Méthode permettant de compléter une requête avec des critères.
	 *
	 * @param array $aRecherche Critères de recherche
	 *
	 * @return string		   Retourne le SQL des critères de recherche
	 */
	public function szGetCriteresRecherche($aRecherche = array(), $sContexte = '')
	{
		// ici on regroupe la recherche sur le cursus 
		$bRechercheCursus = false;
		$sSelectCursus = 'SELECT CUR.id_etudiant ';
		$sFromCursus = ' FROM etudiant_cursus CUR ';
		$sWhereCursus = ' WHERE 1=1 ';


		$sRequete = '';
		if (isset($aRecherche['nIdEtudiant']) === true && $aRecherche['nIdEtudiant'] > 0) {
			if (is_array($aRecherche['nIdEtudiant'])) {
				$sRequete .= "
				AND ETU.id_etudiant IN (".addslashes(implode(", ", $aRecherche['nIdEtudiant'])).")
			";
			} else {
				$sRequete .= "
				AND ETU.id_etudiant = ".addslashes($aRecherche['nIdEtudiant'])."
			";
			}
			
		}
		if (isset($aRecherche['sNationalite']) === true && $aRecherche['sNationalite'] > 0) {
			$sRequete .= "
				AND ETU.nationalite_id = ".addslashes($aRecherche['sNationalite'])."
			";
		}
		if (isset($aRecherche['sFamilleDiplome']) === true && $aRecherche['sFamilleDiplome'] != "") {
			$sRequete .= "
				AND ETU.id_etudiant IN (SELECT id_etudiant FROM etudiant_cursus WHERE famille= '".addslashes($aRecherche['sFamilleDiplome'])."')
			";
		}
		if (isset($aRecherche['sNumeroEtudiant']) === true && $aRecherche['sNumeroEtudiant'] != '') {
			$sRequete .= "
				AND ETU.numero_etudiant = '".addslashes($aRecherche['sNumeroEtudiant'])."'
			";
		}
		if (isset($aRecherche['sNumeroEtudiantPartiel']) === true && $aRecherche['sNumeroEtudiantPartiel'] != '') {
			$sRequete .= "
				AND ETU.numero_etudiant LIKE '%".addslashes($aRecherche['sNumeroEtudiantPartiel'])."%'
			";
		}
		if (isset($aRecherche['sTypeEtudiant']) === true && $aRecherche['sTypeEtudiant'] != '') {
			$sRequete .= "
				AND ETU.type = '".addslashes($aRecherche['sTypeEtudiant'])."'
			";
		}
		if (isset($aRecherche['sNomEtudiantListe']) === true && $aRecherche['sNomEtudiantListe'] != '') {
			$sRequete .= "
				AND (ETU.nom LIKE '".addslashes($aRecherche['sNomEtudiantListe'])."%'
				OR ETU.nom_usage LIKE '".addslashes($aRecherche['sNomEtudiantListe'])."%')
			";
		}
		if (isset($aRecherche['sPrenomEtudiantListe']) === true && $aRecherche['sPrenomEtudiantListe'] != '') {
			$sRequete .= "
				AND (ETU.prenom LIKE '".addslashes($aRecherche['sPrenomEtudiantListe'])."%'
				OR ETU.prenom_usage LIKE '".addslashes($aRecherche['sPrenomEtudiantListe'])."%')
			";
		}
		if (isset($aRecherche['sNom']) === true && $aRecherche['sNom'] != '') {
			$sRequete .= "
				AND ETU.nom = '".addslashes($aRecherche['sNom'])."'
			";
		}
		if (isset($aRecherche['nInscAdmEtat']) === true && $aRecherche['nInscAdmEtat'] != '') {
			$sRequete .= "
				AND ETU.insc_adm_etat = '".addslashes($aRecherche['nInscAdmEtat'])."'
			";
		}
		if (isset($aRecherche['sNomPartiel']) === true && $aRecherche['sNomPartiel'] != '') {
			$sRequete .= "
				AND ETU.nom LIKE '%".addslashes($aRecherche['sNomPartiel'])."%'
			";
		}
		if (isset($aRecherche['sNomPartielGauche']) === true && $aRecherche['sNomPartielGauche'] != '') {
			$sRequete .= "
				AND ETU.nom LIKE '".addslashes($aRecherche['sNomPartielGauche'])."%'
			";
		}
		if (isset($aRecherche['sNomUsagePartiel']) === true && $aRecherche['sNomUsagePartiel'] != '') {
			$sRequete .= "
				AND ETU.nom_usage LIKE '%".addslashes($aRecherche['sNomUsagePartiel'])."%'
			";
		}
		if (isset($aRecherche['sNomUsagePartielGauche']) === true && $aRecherche['sNomUsagePartielGauche'] != '') {
			$sRequete .= "
				AND ETU.nom_usage LIKE '".addslashes($aRecherche['sNomUsagePartielGauche'])."%'
			";
		}
		if (isset($aRecherche['sPrenom']) === true && $aRecherche['sPrenom'] != '') {
			$sRequete .= "
				AND ETU.prenom = '".addslashes($aRecherche['sPrenom'])."'
			";
		}
		if (isset($aRecherche['sPrenomPartiel']) === true && $aRecherche['sPrenomPartiel'] != '') {
			$sRequete .= "
				AND ETU.prenom LIKE '%".addslashes($aRecherche['sPrenomPartiel'])."%'
			";
		}
		if (isset($aRecherche['sPrenomPartielGauche']) === true && $aRecherche['sPrenomPartielGauche'] != '') {
			$sRequete .= "
				AND ETU.prenom LIKE '".addslashes($aRecherche['sPrenomPartielGauche'])."%'
			";
		}

		if (isset($aRecherche['sPrenomUsage']) === true && $aRecherche['sPrenomUsage'] != '') {
			$sRequete .= "
				AND ETU.prenom_usage = '".addslashes($aRecherche['sPrenomUsage'])."'
			";
		}
		if (isset($aRecherche['sPrenomUsagePartiel']) === true && $aRecherche['sPrenomUsagePartiel'] != '') {
			$sRequete .= "
				AND ETU.prenom_usage LIKE '%".addslashes($aRecherche['sPrenomUsagePartiel'])."%'
			";
		}
		if (isset($aRecherche['sPrenomUsagePartielGauche']) === true && $aRecherche['sPrenomUsagePartielGauche'] != '') {
			$sRequete .= "
				AND ETU.prenom_usage LIKE '".addslashes($aRecherche['sPrenomUsagePartielGauche'])."%'
			";
		}

		if (isset($aRecherche['sEmail']) === true && $aRecherche['sEmail'] != '') {
			$sRequete .= "
				AND CO.type = 'principal' AND CO.email = '".addslashes($aRecherche['sEmail'])."'
			";
		}

        if (isset($aRecherche['sEmailCnsmd']) === true && $aRecherche['sEmailCnsmd'] != '') {
            $sRequete .= "
				AND ETU.email_cnsmd = '".addslashes($aRecherche['sEmailCnsmd'])."'
			";
        }

		if (isset($aRecherche['sEmailCnsmd']) === true && $aRecherche['sEmailCnsmd'] != '') {
			$sRequete .= "
				AND ETU.email_cnsmd = '".addslashes($aRecherche['sEmailCnsmd'])."'
			";
		}
		if (isset($aRecherche['sEmailPartiel']) === true && $aRecherche['sEmailPartiel'] != '') {
			$sRequete .= "
				AND CO.type = 'principal' AND CO.email LIKE '%".addslashes($aRecherche['sEmailPartiel'])."%'
			";
		}
		if (isset($aRecherche['sEmailPartielGauche']) === true && $aRecherche['sEmailPartielGauche'] != '') {
			if (!isset($aRecherche["bModeListe"]) || (!$aRecherche["bModeListe"])) {
				$sRequete .= "
					AND CO.type = 'principal' AND CO.email LIKE '".addslashes($aRecherche['sEmailPartielGauche'])."%'
				";				
			} else {
				$sRequete .= " AND ETU.id_etudiant IN (
					SELECT id_etudiant FROM coordonnee CO WHERE CO.type = 'principal' AND CO.email LIKE '".addslashes($aRecherche['sEmailPartielGauche'])."%')
				";
			}
		}

		if (isset($aRecherche['sCursus']) && $aRecherche['sCursus'] != '') {
			$sWhereCursus .= " AND CUR.nom LIKE '%".$aRecherche['sCursus']."%'";
			$bRechercheCursus = true;
		}

		if (isset($aRecherche['nArchiveCursus']) && $aRecherche['nArchiveCursus'] != 'nc') {
			if ($aRecherche['nArchiveCursus'] == 'oui') {
				$aRecherche['nArchiveCursus'] = 1;
			} else {
				$aRecherche['nArchiveCursus'] = 0;
			}

			$sWhereCursus .= " AND IFNULL(CUR.archive,0)='".$aRecherche['nArchiveCursus']."'";
			$bRechercheCursus = true;
		}

		if (isset($aRecherche['sTag']) === true && $aRecherche['sTag'] != '' && $aRecherche['sTag'] != '0') {
			if (!isset($aRecherche["bModeListe"]) || (!$aRecherche["bModeListe"])) {
				$sRequete .= "
					AND ECT.tag = '".addslashes($aRecherche['sTag'])."'
				";
			} else {
				$sFromCursus .= " 
					INNER JOIN etudiant_cursus_tag ECT ON CUR.id_etudiant_cursus=ECT.id_etudiant_cursus";
				$sWhereCursus .= "
					AND ECT.tag = '".addslashes($aRecherche['sTag'])."'
				";
				$bRechercheCursus = true;
			}
		}
		if (isset($aRecherche['sTagPartiel']) === true && $aRecherche['sTagPartiel'] != '' && $aRecherche['sTagPartiel'] != '0') {
			if (!isset($aRecherche["bModeListe"]) || (!$aRecherche["bModeListe"])) {
				$sRequete .= "
					AND ECT.tag LIKE '%".addslashes($aRecherche['sTagPartiel'])."%'
				";
			} else {
				$sFromCursus .= " 
					INNER JOIN etudiant_cursus_tag ECT ON CUR.id_etudiant_cursus=ECT.id_etudiant_cursus";
				$sWhereCursus .= "
					AND ECT.tag LIKE '%".addslashes($aRecherche['sTag'])."%'
				";
				$bRechercheCursus = true;
			}
		}

		if (isset($aRecherche['nIdDepartement']) === true && $aRecherche['nIdDepartement']>0) {
			$sFromCursus .= " 
				INNER JOIN discipline DISC1 ON CUR.id_discipline=DISC1.id_discipline ";
			$sWhereCursus .= "
				AND DISC1.id_departement=".addslashes($aRecherche['nIdDepartement']);
			$bRechercheCursus = true;
		}
		// sur la liste des étudiants on peut filtrer avec l'enseignant, discipline ou créneau
		if ((isset($aRecherche['nIdCreneau']) === true && $aRecherche['nIdCreneau'] > 0)
			|| (isset($aRecherche['nIdDisciplinePrincipale']) === true && $aRecherche['nIdDisciplinePrincipale']>0)
			|| (isset($aRecherche['nIdEnseignant']) === true && $aRecherche['nIdEnseignant'] >0) 
			|| (isset($aRecherche['nIdDisciplineComplementaire']) === true && $aRecherche['nIdDisciplineComplementaire'] >0)
		) {
			$bRechercheCursus = true;
			// partie commune aux 4 recherches :
			$sFromCursus .= " 
				INNER JOIN etudiant_cursus_grille ECG ON CUR.id_etudiant_cursus=ECG.id_etudiant_cursus
				INNER JOIN etudiant_cursus_grille_discipline ECGD ON ECG.id_etudiant_cursus_grille=ECGD.id_etudiant_cursus_grille
			";

			if (isset($aRecherche['nIdDisciplinePrincipale']) === true && $aRecherche['nIdDisciplinePrincipale']>0) {

				if (isset($aRecherche['nIdEnseignant']) && $aRecherche['nIdEnseignant'] > 0) {
					$sFromCursus .= " 
						LEFT JOIN classe_enseignant CE ON CUR.id_classe=CE.id_classe
						LEFT JOIN discipline DISC2 ON CUR.id_discipline=DISC2.id_discipline
						LEFT JOIN departement_chef DC ON DISC2.id_departement=DC.id_departement";
					$sWhereCursus .=" AND (( CE.id_enseignant=".$aRecherche['nIdEnseignant']." AND CE.fin>='".date('Y-m-d')."')"
						." OR (DC.id_enseignant=".$aRecherche['nIdEnseignant']." AND DC.fin>='".date('Y-m-d')."'))";
				}

				if ($aRecherche['sCodeAnneeEnCours']) {
					$sWhereCursus .= " AND ECG.code_annee='".addslashes($aRecherche['sCodeAnneeEnCours'])."'";
				}
				if (isset($aRecherche['nIdDisciplinePrincipale']) === true && $aRecherche['nIdDisciplinePrincipale']>0) {
					$sWhereCursus .= " AND ECGD.id_discipline=".$aRecherche['nIdDisciplinePrincipale'];
				}


			} elseif (isset($aRecherche['nIdCreneau']) === true && $aRecherche['nIdCreneau'] > 0) {
				// la recherche sur créneau est prioritaire aux autres car plus restrictive
				$sWhereCursus .= " AND ECGD.id_planning_enseignant_discipline_creneau=".$aRecherche['nIdCreneau'];
				// CNSMD-800
				if (isset($_SESSION['nIdEnseignant']) && $_SESSION['nIdEnseignant']) {
					$sWhereCursus .= " AND ECGD.`validation`='gestionnaire'";
				}
                /*****************************************/
			} else {
				// pas de créneau donc enseignant ou discipline
				// partie commune :
				$sFromCursus .= "
				 LEFT JOIN planning_enseignant_discipline_creneau PEDC ON PEDC.id_planning_enseignant_discipline_creneau=ECGD.id_planning_enseignant_discipline_creneau
				 LEFT JOIN planning_enseignant_discipline PED ON PED.id_planning_enseignant_discipline=PEDC.id_planning_enseignant_discipline";
				// CNSMD-800
				if (isset($_SESSION['nIdEnseignant']) && $_SESSION['nIdEnseignant']) {
					$sWhereCursus .= " AND ECGD.`validation`='gestionnaire'";
				}

				if ($aRecherche['sCodeAnneeEnCours']) {
					$sWhereCursus .= " AND ECG.code_annee='".addslashes($aRecherche['sCodeAnneeEnCours'])."'";
				}
                if (($aRecherche['nIdDisciplineComplementaire'] ?? 0) > 0) {
					// il y a une discipline principale  ou complémentaire
					$sWhereCursus .= " AND PED.id_discipline=".$aRecherche['nIdDisciplineComplementaire'];
				}

				if (isset($aRecherche['nIdEnseignant']) === true && $aRecherche['nIdEnseignant'] >0) {
					$sWhereCursus .= " AND ((PED.id_enseignant=".$aRecherche['nIdEnseignant'] ." AND PED.date_fin>='".date('Y-m-d')."' )
					 OR (DC.id_enseignant=".$aRecherche['nIdEnseignant']." AND DC.fin>='".date('Y-m-d')."')"
						. (($aRecherche['nIdDisciplineComplementaire'] ?? 0) > 0 ? '' :" OR (CE.id_enseignant=".$aRecherche['nIdEnseignant']." AND CE.fin>='".date('Y-m-d')."')").")";
					// il n'y a pas de discipline complémentaire renseignée, le prof peut être prof d'une classe ou chef de département
					$sFromCursus.= "
					LEFT JOIN classe_enseignant CE ON CUR.id_classe=CE.id_classe
					 LEFT JOIN discipline DISC3 ON CUR.id_discipline=DISC3.id_discipline
					 LEFT JOIN departement_chef DC ON DISC3.id_departement=DC.id_departement";
				}
			}
		}

		if (
			(isset($aRecherche['sCycle']) === true && $aRecherche['sCycle'] != '')
			|| (isset($aRecherche['sFamille']) === true && $aRecherche['sFamille'] != '')
			|| (isset($aRecherche['sAnneeEnCours']) === true && $aRecherche['sAnneeEnCours'] != '')
			|| (isset($aRecherche['sStatut']) === true && $aRecherche['sStatut'] != '')
			|| (isset($aRecherche['sCodeAnneeEnCours']) === true && $aRecherche['sCodeAnneeEnCours'] != '')
		) {
			$bRechercheCursus = true;

			if (isset($aRecherche['sCycle']) === true && $aRecherche['sCycle'] != '') {
				$sWhereCursus .= " AND CUR.cycle='".addslashes($aRecherche['sCycle'])."'";
			}
			if (isset($aRecherche['sFamille']) === true && $aRecherche['sFamille'] != '') {
				$sWhereCursus .= " AND CUR.famille='".addslashes($aRecherche['sFamille'])."'";
			}
			if (isset($aRecherche['sAnneeEnCours']) === true && $aRecherche['sAnneeEnCours'] != '') {
				$sWhereCursus .= " AND CUR.annee_en_cours='".addslashes($aRecherche['sAnneeEnCours'])."'";
			}
			if (isset($aRecherche['sCodeAnneeEnCours']) === true && $aRecherche['sCodeAnneeEnCours'] != '') {
				$sWhereCursus .= " AND CUR.code_annee_en_cours LIKE '%".addslashes($aRecherche['sCodeAnneeEnCours'])."%'";
			}
			if (isset($aRecherche['sStatut']) === true && $aRecherche['sStatut'] != '') {
				$sWhereCursus .= " AND CUR.statut='".addslashes($aRecherche['sStatut'])."'";
			}
		}
		
		if (isset($aRecherche["bAuMoinsUnCursusActif"]) && $aRecherche["bAuMoinsUnCursusActif"]) {
			$bRechercheCursus = true;
			$sWhereCursus .= " AND CUR.statut='normal')";
		}

		if ($sContexte == 'export' && $bRechercheCursus) {
			$sRequete .= " AND ECU.id_etudiant_cursus IN (
				SELECT CUR.id_etudiant_cursus "
				.$sFromCursus.$sWhereCursus.')';

		} elseif ($bRechercheCursus) {
			$sRequete .= " AND ETU.id_etudiant IN ("
				.$sSelectCursus.$sFromCursus.$sWhereCursus.')';
		}

		// if (isset($aRecherche['sPrenomComplementaire']) === true && $aRecherche['sPrenomComplementaire'] != '') {
		// 	$sRequete .= "
		// 		AND ETU.prenom_complementaire = '".addslashes($aRecherche['sPrenomComplementaire'])."'
		// 	";
		// }
		// if (isset($aRecherche['sPrenomComplementairePartiel']) === true && $aRecherche['sPrenomComplementairePartiel'] != '') {
		// 	$sRequete .= "
		// 		AND ETU.prenom_complementaire LIKE '%".addslashes($aRecherche['sPrenomComplementairePartiel'])."%'
		// 	";
		// }
		// if (isset($aRecherche['sIne']) === true && $aRecherche['sIne'] != '') {
		// 	$sRequete .= "
		// 		AND ETU.ine = '".addslashes($aRecherche['sIne'])."'
		// 	";
		// }
		// if (isset($aRecherche['sInePartiel']) === true && $aRecherche['sInePartiel'] != '') {
		// 	$sRequete .= "
		// 		AND ETU.ine LIKE '%".addslashes($aRecherche['sInePartiel'])."%'
		// 	";
		// }
		if (isset($aRecherche['dNaissanceDateDebut']) === true && $aRecherche['dNaissanceDateDebut'] != '') {
			if (!preg_match('/:/', $aRecherche['dNaissanceDateDebut']) && !preg_match('/h/', $aRecherche['dNaissanceDateDebut'])) {
				$aRecherche['dNaissanceDateDebut'] .= '';
			}
			$sRequete .= "
				AND ETU.naissance_date >= '".addslashes($this->sGetDateFormatUniversel($aRecherche['dNaissanceDateDebut']."", 'Y-m-d'))."'
			";
		}
		if (isset($aRecherche['dNaissanceDateFin']) === true && $aRecherche['dNaissanceDateFin'] != '') {
			if (!preg_match('/:/', $aRecherche['dNaissanceDateDebut']) && !preg_match('/h/', $aRecherche['dNaissanceDateDebut'])) {
				$aRecherche['dNaissanceDateDebut'] .= '';
			}
			$sRequete .= "
				AND ETU.naissance_date <= '".addslashes($this->sGetDateFormatUniversel($aRecherche['dNaissanceDateFin']."", 'Y-m-d'))."'
			";
		}
		if (isset($aRecherche['dArchiveDateFin']) === true && $aRecherche['dArchiveDateFin'] != '') {
			$sRequete .= "
				AND ETU.archive_date IS NOT NULL AND ETU.archive_date <= '".addslashes($this->sGetDateFormatUniversel($aRecherche['dArchiveDateFin']."", 'Y-m-d'))."'
			";
		}
		
		if (isset($aRecherche['nArchive']) === true && $aRecherche['nArchive'] != 'nc') {
			if ($aRecherche['nArchive'] == 'oui') {
				$aRecherche['nArchive'] = 1;
			} else {
				$aRecherche['nArchive'] = 0;
			}
			$sRequete .= "
				AND ETU.archive = ".addslashes($aRecherche['nArchive'])."
			";
		}

		if (isset($aRecherche['nInscAdmObligatoire']) === true && $aRecherche['nInscAdmObligatoire'] != 'nc') {
			if ($aRecherche['nInscAdmObligatoire'] == 'oui') {
				$aRecherche['nInscAdmObligatoire'] = 1;
			} else {
				$aRecherche['nInscAdmObligatoire'] = 0;
			}
			$sRequete .= "
				AND ETU.insc_adm_obligatoire = ".addslashes($aRecherche['nInscAdmObligatoire'])."
			";
		}

		if (isset($aRecherche['nInscAdmPaiementAutorise']) === true && $aRecherche['nInscAdmPaiementAutorise'] != 'nc') {
			if ($aRecherche['nInscAdmPaiementAutorise'] == 'oui') {
				$aRecherche['nInscAdmPaiementAutorise'] = 1;
			} else {
				$aRecherche['nInscAdmPaiementAutorise'] = 0;
			}
			$sRequete .= "
				AND ETU.insc_adm_paiement_autorise = ".addslashes($aRecherche['nInscAdmPaiementAutorise'])."
			";
		}
		if (isset($aRecherche['nInscAdmPaiementValide']) === true && $aRecherche['nInscAdmPaiementValide'] != 'nc') {
			if ($aRecherche['nInscAdmPaiementValide'] == 'oui') {
				$aRecherche['nInscAdmPaiementValide'] = 1;
			} else {
				$aRecherche['nInscAdmPaiementValide'] = 0;
			}
			$sRequete .= "
				AND ETU.insc_adm_paiement_valide = ".addslashes($aRecherche['nInscAdmPaiementValide'])."
			";
		}

		if (
			(isset($aRecherche['dDateDepotDebut']) && $aRecherche['dDateDepotDebut'] !='')
			|| (isset($aRecherche['dDateDepotFin']) && $aRecherche['dDateDepotFin'] != '')
			|| (isset($aRecherche['bJustificatifValide']) && $aRecherche['bJustificatifValide'] != 'nc')
		) {
			$sRequete .= " AND ETU.id_etudiant IN "
				." (SELECT id_etudiant FROM absence_justificatif  ";
			$sAnd = ' WHERE ';
			if ($aRecherche['dDateDepotDebut'] != '') {
				$sRequete .= $sAnd." date_depot>='".$this->sGetDateFormatUniversel($aRecherche['dDateDepotDebut'], 'Y-m-d')."'";
				$sAnd = ' AND ';
			}
			if ($aRecherche['dDateDepotFin'] != '') {
				$sRequete .= $sAnd." date_depot<='".$this->sGetDateFormatUniversel($aRecherche['dDateDepotFin'], 'Y-m-d')." 23:59:59'";
				$sAnd = ' AND ';
			}
			if ($aRecherche['bJustificatifValide'] == 'oui') {
				$sRequete .= $sAnd." valide=1";
				$sAnd = ' AND ';
			}
			if ($aRecherche['bJustificatifValide'] == 'non') {
				$sRequete .= $sAnd." valide=0";
				$sAnd = ' AND ';
			}
			$sRequete .= ")";
		}

		return $sRequete;
	}


	/**
	 * Permet de récupérer les critères de validation du formulaire d'édition.
	 *
	 * @param  string $szNomChamp Nom du champ.
	 * @param  string $szType	 Type de retour (chaine ou tableau).
	 *
	 * @return string			 Critères (chaine ou tableau).
	 */
	public function aGetCriteres($szNomChamp = '', $szType = 'tableau')
	{
		$aConfig = parent::aGetCriteres();

		$aConfig['nIdEtudiant'] = array(
			'required' => '1',
			'minlength' => '1',
			'maxlength' => '11',
		);
		$aConfig['sNumeroEtudiant'] = array(
			'required' => '1',
			'maxlength' => '20',
		);
		$aConfig['sEmail'] = array(
			'required' => '1',
			'maxlength' => '20',
		);
		$aConfig['sNom'] = array(
			'required' => '1',
			'maxlength' => '100',
		);
		$aConfig['sPrenom'] = array(
			'required' => '1',
			'maxlength' => '50',
		);
		$aConfig['sPrenomUsage'] = array(
			'maxlength' => '50',
		);
		$aConfig['sPrenomComplementaire'] = array(
			'maxlength' => '50',
		);
		$aConfig['sIne'] = array(
			'maxlength' => '20',
		);
		$aConfig['dNaissanceDate'] = array(
			'required' => '1',
			'minlength' => '10',
			'maxlength' => '10',
		);
		$aConfig['sNaissanceCodePostal'] = array(
			'maxlength' => '10',
		);
		$aConfig['sNaissanceVille'] = array(
			'maxlength' => '100',
		);
		$aConfig['sNaissancePays'] = array(
			'maxlength' => '100',
		);
		$aConfig['sNationalite'] = array(
			'maxlength' => '100',
		);
		$aConfig['nBacObtenu'] = array(
			'maxlength' => '4',
		);
		$aConfig[''] = array(
		);
		$aConfig['sBacSection'] = array(
		);
		$aConfig['sBacDepartement'] = array(
			'maxlength' => '5',
		);
		$aConfig['sEtablissementEnCours'] = array(
			'maxlength' => '100',
		);
		$aConfig['sDernierDiplomeType'] = array(
			'maxlength' => '100',
		);
		$aConfig['sSituationAnneePrecedente'] = array(
			'maxlength' => '100',
		);
		$aConfig['sEtudesEtablissement'] = array(
			'maxlength' => '100',
		);
		$aConfig['sEtudesVille'] = array(
			'maxlength' => '100',
		);
		$aConfig['sEtudesPays'] = array(
			'maxlength' => '100',
		);
		$aConfig['sEtudesDiplome'] = array(
			'maxlength' => '100',
		);
		$aConfig['sEtudesDiplomeAnnee'] = array(
			'maxlength' => '100',
		);
		$aConfig['sCodeMetierParent1'] = array(
			'maxlength' => '100',
		);
		$aConfig['sCodeMetierParent2'] = array(
			'maxlength' => '100',
		);
		$aConfig['sSituationProEtudiant'] = array(
			'maxlength' => '100',
		);

		if ($szType == 'tableau') {
			return $aConfig[$szNomChamp];
		} elseif ($szType == 'chaine') {
			if (isset($aConfig[$szNomChamp]) === true) {
				return $this->szGetCriteresValidation($aConfig[$szNomChamp]);
			}
		}
	}


	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateInfosEtudiant()
	{
		$bRetour = false;

		$sRequete = "
			INSERT INTO etudiant (
				
				id_etudiant, 
				type,
				civilite,
				nom, 
				prenom, 
				nom_usage, 
				prenom_complementaire, 
				prenom_usage, 
				nom_scene,

				numero_etudiant,
				ine,
				email_cnsmd,
				etablissement_rattachement,
                libelle_cursus_carte_etudiant,
				archive,
				archive_date,
				sortie_date,

				insc_adm_etat,
				insc_adm_montant,
				insc_adm_montant_sco,
				insc_adm_montant_media,
				insc_adm_montant_peda,
				insc_adm_paiement_autorise,
				insc_adm_paiement_valide,
				insc_adm_cas_particulier,
				insc_adm_obligatoire,
				naissance_date, 
				naissance_pays_id, 
				nationalite_id,
				naissance_code_postal, 
				naissance_ville, 
				naissance_ville_id, 
				cvec_numero_attestation,
				derniere_modif_date,
				derniere_modif_identifiant

			)
			VALUES(
				'".addslashes($this->nIdEtudiant)."',
				'".addslashes($this->sTypeEtudiant)."',
				'".addslashes($this->sCivilite)."',
				'".addslashes(mb_strtoupper($this->sNom, 'UTF-8'))."', 
				'".addslashes(ucwords($this->sPrenom, "\t\r\n\f\v- '"))."', 
				'".addslashes(mb_strtoupper($this->sNomUsage, 'UTF-8'))."',
				'".addslashes(ucwords($this->sPrenomComplementaire, "\t\r\n\f\v- '"))."', 
				'".addslashes(ucwords($this->sPrenomUsage, "\t\r\n\f\v- '"))."', 
				'".addslashes(mb_strtoupper($this->sNomScene, 'UTF-8'))."',

				'".addslashes($this->sNumeroEtudiant)."',
				'".addslashes($this->sIne)."',
				'".addslashes($this->sEmailCnsmd)."',
				'".addslashes($this->sEtablissementRattachement)."',
				'".addslashes($this->sLibelleCursusCarteEtudiant)."',
				'".addslashes(str_replace(array('oui', 'non', 'nc'), array('1', '0', ''), $this->nArchive))."',
				'".addslashes($this->sGetDateFormatUniversel($this->dArchiveDate, 'Y-m-d'))."',
				'".addslashes($this->sGetDateFormatUniversel($this->dSortieEtudiantDate, 'Y-m-d'))."',

				'".str_replace(array(" ", ","), array("", "."), $this->nInscAdmValide)."',
				'".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontant)."',
				'".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantSco)."',
				'".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantMedia)."',
				'".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantPeda)."',
				'".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmPaiementAutorise)."',
				'".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmPaiementValide)."',
				'".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmCasParticulier)."',
				'".addslashes($this->nInscAdmObligatoire)."',
				'".addslashes($this->sGetDateFormatUniversel($this->dNaissanceDate, 'Y-m-d'))."', 
				'".addslashes($this->sNaissancePays)."', 
				'".addslashes($this->sNationalite)."',
				'".addslashes($this->sNaissanceCodePostal)."', 
				'".addslashes($this->sNaissanceVille)."', 
				'".addslashes($this->sNaissanceVilleId)."', 
				'".addslashes($this->sCvecNumeroAttestation)."',
				NOW(),
				'".$_SESSION['szIdentifiant']."'
			)
			ON DUPLICATE KEY UPDATE
				id_etudiant = '".addslashes($this->nIdEtudiant)."', 
				type = '".addslashes($this->sTypeEtudiant)."',
				civilite = '".addslashes($this->sCivilite)."',
				nom = '".addslashes(mb_strtoupper($this->sNom, 'UTF-8'))."', 
				prenom = '".addslashes(ucwords($this->sPrenom, "\t\r\n\f\v- '"))."', 
				prenom_usage = '".addslashes(ucwords($this->sPrenomUsage, "\t\r\n\f\v- '"))."', 
				nom_usage = '".addslashes(mb_strtoupper($this->sNomUsage, 'UTF-8'))."', 
				prenom_complementaire = '".addslashes(ucwords($this->sPrenomComplementaire, "\t\r\n\f\v- '"))."', 
				nom_scene = '".addslashes(mb_strtoupper($this->sNomScene, 'UTF-8'))."',
				
				ine = '".addslashes($this->sIne)."',
				email_cnsmd = '".addslashes($this->sEmailCnsmd)."',
				etablissement_rattachement = '".addslashes($this->sEtablissementRattachement)."',
				libelle_cursus_carte_etudiant = '".addslashes($this->sLibelleCursusCarteEtudiant)."',
				archive = '".addslashes(str_replace(array('oui', 'non', 'nc'), array('1', '0', ''), $this->nArchive))."',
				archive_date = '".addslashes($this->sGetDateFormatUniversel($this->dArchiveDate, 'Y-m-d'))."',
				sortie_date = '".addslashes($this->sGetDateFormatUniversel($this->dSortieEtudiantDate, 'Y-m-d'))."',

				insc_adm_etat = '".str_replace(array(" ", ","), array("", "."), $this->nInscAdmValide)."',
				insc_adm_montant = '".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontant)."',
				insc_adm_montant_sco = '".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantSco)."',
				insc_adm_montant_media = '".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantMedia)."',
				insc_adm_montant_peda = '".str_replace(array(" ", ","), array("", "."), $this->nInscAdmMontantPeda)."',
				insc_adm_paiement_autorise = '".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmPaiementAutorise)."',
				insc_adm_paiement_valide = '".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmPaiementValide)."',
				insc_adm_cas_particulier = '".str_replace(array("oui", "non"), array("1", "0"), $this->nInscAdmCasParticulier)."',
				insc_adm_obligatoire = '".addslashes($this->nInscAdmObligatoire)."',
				naissance_date = '".addslashes($this->sGetDateFormatUniversel($this->dNaissanceDate, 'Y-m-d'))."', 
				naissance_pays_id = '".addslashes($this->sNaissancePays)."', 
				nationalite_id = '".addslashes($this->sNationalite)."',
				naissance_code_postal = '".addslashes($this->sNaissanceCodePostal)."', 
				naissance_ville = '".addslashes($this->sNaissanceVille)."',
				naissance_ville_id = '".addslashes($this->sNaissanceVilleId)."', 
				cvec_numero_attestation = '".addslashes($this->sCvecNumeroAttestation)."',
				derniere_modif_date = NOW(),
				derniere_modif_identifiant = '".$_SESSION['szIdentifiant']."'
		";
		// echo $sRequete."\r\n";
		$rLien = $this->rConnexion->query($sRequete);
		$this->nIdEtudiant = $this->rConnexion->lastInsertId();

		if ($rLien) {
			$bRetour = true;

			$this->sIdentifiant = $this->sNumeroEtudiant;
			// echo $this->sIdentifiant.' / '.$this->sNumeroEtudiant;

			// Création/Mise à jour de l'utilisateur rattaché 
			// à l'étudiant. Ce qui lui permettra de se connecter.
			// EC 28/11/2018 il y a ici peut être un pb en préprod ou démo
			// ==> plutôt que de faire le test sur "==0" on va faire le test NOT
			// if ($this->nIdUtilisateur == 0) {
			if (!$this->nIdUtilisateur || strtoupper($this->nIdUtilisateur) == "NULL") {
				// attention parent=Membre, pas Utilisateur
				parent::bInsert();
				$sRequete = "UPDATE etudiant ".
							"SET id_utilisateur = ".$this->nIdUtilisateur." ".
							"WHERE id_etudiant = ".$this->nIdEtudiant;
				$rLien = $this->rConnexion->query($sRequete);
				// EC 28/11/2018 : il faut un enregistrement dans utilisateur_groupe
				$sRequete = "INSERT INTO utilisateur_groupe (id_utilisateur, id_groupe) "
					." VALUES (".$this->nIdUtilisateur.", 4)";
				$rLien = $this->rConnexion->query($sRequete);

			} else {
				if (str_replace(array('oui', 'non', 'nc'), array('1', '0', ''), $this->nArchive)) {
					$this->nActif = '0';
				} else {
					$this->nActif = '1';
				}
				// attention parent=Membre, pas Utilisateur
				parent::bUpdate();
			}
		}

		return $bRetour;
	}


	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateInfosDiplome()
	{
		$bRetour = false;

		$sRequete = "
			INSERT INTO etudiant ( 
				
				id_etudiant, 
				bac_section,
				bac_departement,
				etablissement_en_cours,
				bac_obtenu,
				bac_annee,
				dernier_diplome_type,
				situation_annee_precedente,
				etudes_etablissement,
				etudes_ville,
				etudes_pays_id,
				etudes_diplome,
				etudes_diplome_annee,
				
				derniere_modif_date,
				derniere_modif_identifiant
			)
			VALUES(
				'".addslashes($this->nIdEtudiant)."',
				'".addslashes($this->sBacSection)."',
				'".addslashes($this->sBacDepartement)."',
				'".addslashes($this->sEtablissementEnCours)."',
				'".addslashes($this->nBacObtenu)."',
				'".addslashes($this->nBacAnnee)."',
				'".addslashes($this->sDernierDiplomeType)."',
				'".addslashes($this->sSituationAnneePrecedente)."',
				'".addslashes($this->sEtudesEtablissement)."',
				'".addslashes($this->sEtudesVille)."',
				'".addslashes($this->sEtudesPays)."',
				'".addslashes($this->sEtudesDiplome)."',
				'".addslashes($this->sEtudesDiplomeAnnee)."',
				NOW(),
				'".$_SESSION['szIdentifiant']."'

			)
			ON DUPLICATE KEY UPDATE

				bac_section = '".addslashes($this->sBacSection)."',
				bac_departement = '".addslashes($this->sBacDepartement)."',
				etablissement_en_cours = '".addslashes($this->sEtablissementEnCours)."',
				bac_obtenu = '".addslashes($this->nBacObtenu)."',
				bac_annee = '".addslashes($this->nBacAnnee)."',
				dernier_diplome_type = '".addslashes($this->sDernierDiplomeType)."',
				situation_annee_precedente = '".addslashes($this->sSituationAnneePrecedente)."',
				etudes_etablissement = '".addslashes($this->sEtudesEtablissement)."',
				etudes_ville = '".addslashes($this->sEtudesVille)."',
				etudes_pays_id = '".addslashes($this->sEtudesPays)."',
				etudes_diplome = '".addslashes($this->sEtudesDiplome)."',
				etudes_diplome_annee = '".addslashes($this->sEtudesDiplomeAnnee)."',
				derniere_modif_date = NOW(),
				derniere_modif_identifiant = '".$_SESSION['szIdentifiant']."'
		";
		// echo $sRequete."\r\n";
		$rLien = $this->rConnexion->query($sRequete);
		//$this->nIdEtudiant = $this->rConnexion->lastInsertId();

		if ($rLien) {
			$bRetour = true;
			//$this->bSetLog('insert_etudiant', $this->nIdEtudiant);
		}

		return $bRetour;

	}
	
	/**
	 * Teste la présence de l'email dans la table des utilisateurs
	 *
	 * @return void
	 */
	function bTestEmailUtilisateur() {
		$bRetour = true;
		$sRequete = "SELECT * FROM utilisateur WHERE (email='".$this->sEmailCoordonnee."' OR identifiant='".$this->sEmailCoordonnee."') ";
		if ($this->nIdUtilisateur > 0) {
			$sRequete .= " AND id_utilisateur != ".$this->nIdUtilisateur;
		}
		$aTest = $this->aSelectBDD($sRequete);
		if (count($aTest) > 0) {
			$this->sMessagePDO = "Cet email existe déjà dans la table des utilisateurs";
			$bRetour = false;
		}

		return $bRetour;
	}

    /**
     *
     * Teste l'unicité du champ email_cnsmd
     * @param $sEmail
     * @return bool
     */
    function bTestEmailCnsmdUnique()
    {
        $bRetour = true;
        $sRequete = "SELECT id_etudiant FROM etudiant WHERE email_cnsmd = '".$this->sEmailCnsmd."'";

        if ($this->nIdUtilisateur > 0) {
            $sRequete .= " AND id_utilisateur != ".$this->nIdUtilisateur;
        }

        $aResultat = $this->aSelectBDD($sRequete);
        if (count($aResultat) > 0) {
            $this->sMessagePDO = "Cet email existe déjà dans la table des utilisateurs";
            $bRetour = false;
        }

        return $bRetour;

    }

	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateCoordonnee()
	{
		$bRetour = false;
		$bTest = true;
		// ajout d'un test sur l'email qui doit être unique dasn la BDD
		if ($this->sTypeCoordonnee == 'principal' && $this->sEmailCoordonnee) {
			$bTest = $this->bTestEmailUtilisateur();
		}

		if ($bTest) {

			$sRequete = "

				INSERT INTO coordonnee (
					
					id_coordonnee,
					id_etudiant,
					type,
					nom,
					prenom,
					email,
					tel,
					adresse,
					code_postal,
					ville,
					pays_id,
					complement,
					complement_autre,
					personne_a_prevenir, officielle
				)
				VALUES(
					'".addslashes($this->nIdCoordonnee)."',
					'".addslashes($this->nIdEtudiant)."',
					'".addslashes($this->sTypeCoordonnee)."',
					'".addslashes($this->sNomCoordonne)."',
					'".addslashes($this->sPrenomCoordonne)."',
					'".addslashes($this->sEmailCoordonnee)."',
					'".addslashes($this->nTelephoneCoordonne)."',
					'".addslashes($this->sAdresseCoordonnee)."',
					'".addslashes($this->nCodePostalCoordonnee)."',
					'".addslashes($this->sVilleCoordonnee)."',
					'".addslashes($this->sPaysCoordonnee)."',
					'".addslashes($this->sAdresseCoordonneeComplement)."',
					'".addslashes($this->sAdresseCoordonneeComplementAutre)."',
					'".addslashes($this->nPersonneAPrevenir)."',
					'".addslashes($this->bOfficielle)."'
				)
				ON DUPLICATE KEY UPDATE

					id_coordonnee = '".addslashes($this->nIdCoordonnee)."', 
					type = '".addslashes($this->sTypeCoordonnee)."', 
					nom = '".addslashes($this->sNomCoordonne)."', 
					prenom = '".addslashes($this->sPrenomCoordonne)."', 
					email = '".addslashes($this->sEmailCoordonnee)."', 
					tel = '".addslashes($this->nTelephoneCoordonne)."', 
					adresse = '".addslashes($this->sAdresseCoordonnee)."', 
					code_postal = '".addslashes($this->nCodePostalCoordonnee)."', 
					ville = '".addslashes($this->sVilleCoordonnee)."',
					pays_id = '".addslashes($this->sPaysCoordonnee)."',
					complement = '".addslashes($this->sAdresseCoordonneeComplement)."',
					complement_autre = '".addslashes($this->sAdresseCoordonneeComplementAutre)."',
					personne_a_prevenir = '".addslashes($this->nPersonneAPrevenir)."',
					officielle = '".addslashes($this->bOfficielle)."'
			";
			// echo "<pre>$sRequete</pre>";
			// exit;

			$rLien = $this->rConnexion->query($sRequete);

			if ($rLien) {
				if (!$this->nIdCoordonnee) {
					$this->nIdCoordonnee = $this->rConnexion->lastInsertId();
				}
				$bRetour = true;

				if ($this->bOfficielle) {
					$sRequeteAvant = "UPDATE coordonnee SET officielle=0 WHERE id_etudiant=".$this->nIdEtudiant." AND officielle=1 AND id_coordonnee!=".$this->nIdCoordonnee;
					$this->rConnexion->query($sRequeteAvant);
				}

				if ($this->sTypeCoordonnee == 'principal') {
					// L'adresse email de l'utilisateur est celle du 
					// contact principal. Du coup, si je suis sur le 
					// contact principal je l'enregistre dans l'utilisateur 
					// lié à l'étudiant.
					$this->sEmail = $this->sEmailCoordonnee;
					if ($this->nIdUtilisateur == 0) {
						// attention parent=Membre, pas Utilisateur
						parent::bInsert();
					} else {
						// attention parent=Membre, pas Utilisateur
						parent::bUpdate();
					}

				}
			} else {
				$this->sMessagePDO = $this->rConnexion->sMessagePDO;
			}
		}

		return $bRetour;
	}


	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateInfosSup()
	{
			$bRetour = false;

			$sRequete = "

				INSERT INTO etudiant (
					
					id_etudiant,
					code_metier_parent_1,
					code_metier_parent_2,
					sexe_parent_1,
					sexe_parent_2,
					situation_pro_etudiant,
					formation_activite_pro,
					formation_financeur,
					formation_financeur_ville,
					formation_pro_dispositif,
					derniere_modif_date,
					derniere_modif_identifiant,
					bourse_type,
					bourse_echelon
					
				)
				VALUES(
					'".addslashes($this->nIdEtudiant)."',
					'".addslashes($this->sCodeMetierParent1)."',
					'".addslashes($this->sCodeMetierParent2)."',
					'".addslashes($this->sSexeParent1)."',
					'".addslashes($this->sSexeParent2)."',
					'".addslashes($this->sSituationProEtudiant)."',
					'".addslashes($this->sFormationActivitePro)."',
					'".addslashes($this->sFormationFinanceur)."',
					'".addslashes($this->sFormationFinanceurVille)."',
					'".addslashes($this->sFormationProDispositif)."',
					NOW(),
					'".$_SESSION['szIdentifiant']."',
					'".addslashes($this->sTypeBourse)."',
					'".addslashes($this->sBourseEchelon)."'		
				)
				ON DUPLICATE KEY UPDATE

					code_metier_parent_1 = '".addslashes($this->sCodeMetierParent1)."', 
					code_metier_parent_2 = '".addslashes($this->sCodeMetierParent2)."', 
					sexe_parent_1 = '".addslashes($this->sSexeParent1)."', 
					sexe_parent_2 = '".addslashes($this->sSexeParent2)."', 
					situation_pro_etudiant = '".addslashes($this->sSituationProEtudiant)."',
					formation_activite_pro = '".addslashes($this->sFormationActivitePro)."',
					formation_financeur = '".addslashes($this->sFormationFinanceur)."',
					formation_financeur_ville = '".addslashes($this->sFormationFinanceurVille)."',
					formation_pro_dispositif = '".addslashes($this->sFormationProDispositif)."',
					derniere_modif_date = NOW(),
					derniere_modif_identifiant = '".$_SESSION['szIdentifiant']."',
					bourse_type = '".addslashes($this->sTypeBourse)."',
					bourse_echelon = '".addslashes($this->sBourseEchelon)."'
			";

		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;

			parent::bUpdateEmailing($this->nEmailing);
			//$this->bSetLog('insert_etudiant', $this->nIdEtudiant);
			// $oEtudiantCursus = $this->oNew("EtudiantCursus");
			// $oEtudiantCursus->bCalculeMontantFraisInscription($this->nIdEtudiant);

		}

		return $bRetour;
	}

	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateEtudiantAdminsitration()
	{
			$bRetour = false;

			$sRequete = "

				UPDATE etudiant SET 
					nom_usage = '".addslashes($this->sNomUsage)."', 
					ine = '".addslashes($this->sIne)."', 
					etablissement_en_cours = '".addslashes($this->sEtablissementEnCours)."', 
					bac_obtenu = '".addslashes($this->nBacObtenu)."', 
					bac_annee = '".addslashes($this->nBacAnnee)."', 
					bac_departement = '".addslashes($this->sBacDepartement)."', 
					bac_section = '".addslashes($this->sBacSection)."', 
					dernier_diplome_type = '".addslashes($this->sDernierDiplomeType)."', 
					situation_annee_precedente = '".addslashes($this->sSituationAnneePrecedente)."', 
					etudes_diplome = '".addslashes($this->sEtudesDiplome)."', 
					etudes_diplome_annee = '".addslashes($this->sEtudesDiplomeAnnee)."', 
					situation_pro_etudiant = '".addslashes($this->sSituationProEtudiant)."', 
					formation_activite_pro = '".addslashes($this->sFormationActivitePro)."', 
					code_metier_parent_1 = '".addslashes($this->sCodeMetierParent1)."', 
					code_metier_parent_2 = '".addslashes($this->sCodeMetierParent2)."', 
					sexe_parent_1 = '".addslashes($this->sSexeParent1)."', 
					sexe_parent_2 = '".addslashes($this->sSexeParent2)."', 
					bourse_type = '".addslashes($this->sTypeBourse)."', 
					bourse_echelon = '".addslashes($this->sBourseEchelon)."', 
					cvec_numero_attestation = '".addslashes($this->sCvecNumeroAttestation)."' 
					WHERE id_etudiant = '".addslashes($this->nIdEtudiant)."'
			";
		// echo $sRequete."\r\n";
		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;
			$oEtudiantCursus = $this->oNew("EtudiantCursus");
			$oEtudiantCursus->bCalculeMontantFraisInscription($this->nIdEtudiant);
		}

		return $bRetour;
	}


	/**
	 * Suppression d'un élément.
	 *
	 * @return void
	 */
	public function bDelete()
	{
		$bRetour = false;

		$sRequete = "
			DELETE 
			FROM etudiant 
			WHERE id_etudiant = '".$this->nIdEtudiant."'
		";

		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;
			$this->bSetLog('delete_etudiant', $this->nIdEtudiant);
		} else {
			$this->sMessagePDO = $this->rConnexion->sMessagePDO;
		}

		return $bRetour;
	}

	/**
	 * MODULE PARAMETRE ? 
	 */
	public function aGetParametre($sTypeParametre = '')
	{
		$aNationalite = array();

		$szRequete = "

			SELECT id_parametre, type, code, valeur, valeur_num, valeur_texte, valeur_bool, valeur_date, valeur_texte_autre AS sValeurTexteAutre, archive
			FROM parametre
			WHERE type = '".$sTypeParametre."' AND archive=0 ORDER BY valeur_num, valeur
		";

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Récupère les coordonnées lié à l'étudiant
	 *
	 * @return array 	Tableau de résultats
	 */
	public function aGetCoordoonnee()
	{
		$szRequete = "

			SELECT *
			FROM coordonnee CO
			LEFT JOIN parametre PA ON(PA.code = CO.type)
			WHERE id_etudiant = '".$this->nIdEtudiant."'
		";

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Récupère une liste de ville insee pour un élément de recherche donné
	 * 	 
	 * @param 	array 	$aRecherche		Critère de recherche
	 * @return 	array					Tableaux de résultats
	 */
	public function aGetCommuneINSEE($aRecherche = array())
	{
		$szRequete = "

			SELECT *
			FROM param_commune_insee
			WHERE 1=1 AND replace(commune,'-', ' ') LIKE '%" . $aRecherche['sVilleRch'] . "%' OR replace(commune,' ', '-') LIKE '%" . $aRecherche['sVilleRch'] . "%'
			ORDER BY commune ASC
		";

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Récupère la ville insee pour un id donné
	 *
	 * @param 	integer	id de l'élément
	 * @return  array	Tableau de résultats
	 */
	public function aGetVilleINSEE($nIdElement)
	{
		$szRequete = "

			SELECT id_commune, code_insee, code_postal, CONCAT(IFNULL(commune, ''), ' ', IFNULL(code_postal, '')) AS commune, commune AS sCommune, codes_postaux
			FROM param_commune_insee
			WHERE id_commune = '".$nIdElement."'
		";

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Récupère la ville pour un critère
	 *
	 * @param 	integer	id de l'élément
	 * @return  array	Tableau de résultats
	 */
	public function aGetVille($sWhere)
	{
		$szRequete = "
			SELECT id_commune, code_insee, code_postal, IFNULL(commune, '') AS commune
			FROM param_commune_insee
			WHERE ".$sWhere;
		$aResultats = $this->aSelectBDD($szRequete);

		return $aResultats;
	}

	public function bLogModification($sKey, $nIdElement)
	{
		$this->bSetLog($sKey, $nIdElement);
	}

	public function bLogInsertion($sKey, $nIdElement)
	{
		$this->bSetLog($sKey, $nIdElement);
	}

	/**
	 * Récupère la liste des payes INSEE
	 *
	 * @return void
	 */
	public function aGetPaysInsee($nIdPays = 0)
	{
		$szRequete = "

			SELECT *
			FROM param_pays_insee
		";
		if ($nIdPays) {
			$szRequete .= " WHERE id_pays=".$nIdPays;
		}

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Insertion ou mise à jour d'un élément.
	 *
	 * @return void
	 */
	public function bInsertOrUpdateCommentaire()
	{
		$bRetour = false;

		$sRequete = "

			INSERT INTO commentaire (
				
				id_commentaire,
				id_etudiant, 
				identifiant,
				date_saisie,
				type,
				visible_etudiant,
				visible_enseignant,
				valeur

			)
			VALUES(
				'".addslashes($this->nIdCommentaire)."',
				'".addslashes($this->nIdEtudiant)."',
				'".$_SESSION['szIdentifiant']."',
				NOW(),
				'".addslashes($this->nTypeCommentaire)."',
				'".addslashes($this->nVisibiliteEtudiant)."',
				'".addslashes($this->nVisibiliteProfesseur)."',
				'".addslashes($this->sCommentaireEtudiant)."'
			)
			ON DUPLICATE KEY UPDATE

				type = '".addslashes($this->nTypeCommentaire)."',
				visible_etudiant = '".addslashes($this->nVisibiliteEtudiant)."',
				visible_enseignant = '".addslashes($this->nVisibiliteProfesseur)."',
				valeur = '".addslashes($this->sCommentaireEtudiant)."'
		";

		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;
		}

		return $bRetour;
	}

	/**
	 * Tous les commentaires d'une fiche étudiante
	 *
	 * @param 	integer	id de l'élément
	 * @return  array	Tableau de résultats
	 */
	public function aGetCommentaire()
	{
		$szRequete = "

			SELECT id_commentaire, id_etudiant, identifiant, date_saisie, type, visible_etudiant, visible_enseignant, valeur AS sCommentaireEtudiant
			FROM commentaire
			WHERE id_etudiant = '".$this->nIdEtudiant."'
		";

		// si enseignant connecté : 
		if ( in_array("enseignant", $_SESSION["aRoles"]) && $_SESSION["nIdEnseignant"]) {
			$szRequete .= " AND visible_enseignant= 1";
		}
		// si étudiant connecté : certains onglets seront masqués
		if ( in_array("etudiant", $_SESSION["aRoles"]) && $_SESSION["nIdEtudiant"]) {
			$szRequete .= " AND visible_etudiant= 1";
		}


		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Supprime le contact d'un étudiant 
	 *
	 * @return 	bool	$bRetour 	Retour execution requête
	 */
	public function bDeleteContactEtudiant() {

		$bRetour = false;

		$sRequete = "
			DELETE 
			FROM coordonnee 
			WHERE id_coordonnee = '".$this->nIdCoordonnee."'
		";

		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;
			//$this->bSetLog('delete_coordoonnee', $this->nIdEtudiant);
		} else {
			$this->sMessagePDO = $this->rConnexion->sMessagePDO;
		}

		return $bRetour;
	}

	
	public function aGetValidationCoordonnee()
	{
		$szRequete = "

			SELECT CO.id_coordonnee, CO.type AS sTypeCoordonnee, CO.personne_a_prevenir, CO.pays_id AS nIdPays
			FROM etudiant ETU
			LEFT JOIN coordonnee CO ON (CO.id_etudiant = ETU.id_etudiant)
			WHERE ETU.id_etudiant = '".$this->nIdEtudiant."'
		";

		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Validation d'un document par le gestionnaire
	 *
	 * @return 	array 	$bRetour 	Retour execution requête
	 */
	public function aGetValidationDocument()
	{
		$szRequete = "

			SELECT PA_DOC.type AS sTypeDocument, PA_DOC.code AS nCodeParametre, PA_DOC.valeur_bool AS nValeurBoolParametre, ETU_DOC.type AS sTypeDocumentEtudiant
			FROM parametre PA_DOC
			LEFT JOIN document ETU_DOC ON (ETU_DOC.type = PA_DOC.code AND ETU_DOC.id_etudiant = '".$this->nIdEtudiant."')
			WHERE PA_DOC.type = 'insc_adm_doc'
		";

		
		$aResultats = $this->aSelectBDD($szRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Change le statut d'une inscription administrative
	 *
	 * @param 	string 	$sCode 		Code du statut
	 * @return 	bool	$bRetour	retour execution requête
	 */
	public function bSWitchStatutInscriptionAdministrative($sCode = '')
	{
		$bRetour = false;

		if ($sCode){
			$sRequete = "
				UPDATE etudiant
				SET insc_adm_etat = '".$sCode."',
				insc_adm_etat_date='".date("Y-m-d H:i:s")."'
				WHERE id_etudiant = '".$this->nIdEtudiant."'
			";

			// test EC à virer
			// il y a un traitement qui passerait l'état à brouillon, je ne trouve pas lequel
			if ($sCode == "brouillon") {
				file_put_contents("data/erreur_".date("ymdhis").".log", "Erreur insc_adm_etat ".print_r($_REQUEST, true));
			}

			$rLien = $this->rConnexion->query($sRequete);
	
			if ($rLien) {
				$bRetour = true;
			} else {
				$this->sMessagePDO = $this->rConnexion->sMessagePDO;
			}
		}

		return $bRetour;
	}

	/**
	 * wtf
	 * @param  string $sCodeAnnee [description]
	 * @return [type]             [description]
	 */
	public function aGetEtudiantsPourTrombinoscope($sCodeAnnee = '')
	{
		if ($sCodeAnnee == '') {
			$nMois = date('m');
			$nAnnee = date('Y');
			if ($nMois >= 1 && $nMois <= 6) {
				$sCodeAnnee = (intval($nAnnee) - 1).'-'.$nAnnee;
			} else {
				$sCodeAnnee = $nAnnee.'-'.(intval($nAnnee) + 1);
			}
		}
		// CNSMD-565 
		// LEFT JOIN param_pays_insee as PPI ON(ETU.naissance_pays_id = PPI.id_pays)
		// WHERE ETU.type != 'formation_continue_non_diplomante'
		// etc etc

		$sRequete = "
			SELECT ETU.id_etudiant AS nIdEtudiant, numero_etudiant AS sNumero,
			IF(IFNULL(ETU.nom,'')=IFNULL(ETU.nom_usage,''), ETU.nom, IF(IFNULL(ETU.nom_usage, '')='', ETU.nom, CONCAT(ETU.nom, ' (', ETU.nom_usage, ')'))) AS sNom, 
			IF(IFNULL(ETU.prenom_usage, '') = '', ETU.prenom, ETU.prenom_usage) AS sPrenom, 
			ETU.civilite AS sCivilite,
			(
				SELECT CONCAT(REPLACE(REPLACE(email, '>', ''), '<', ''), '#', tel)
				FROM coordonnee COO 
				WHERE COO.id_etudiant = ETU.id_etudiant 
				AND COO.type = 'principal'
				LIMIT 0, 1
			) AS sEmailTelephone,
			(

				SELECT CONCAT(nom, ' ', prenom, ', ' , type, ', ' , REPLACE(REPLACE(email, '>', ''), '<', ''), ', ',tel) 
				FROM coordonnee COO 
				WHERE COO.id_etudiant = ETU.id_etudiant 
				AND COO.personne_a_prevenir = 1
				LIMIT 0, 1
			) AS sContactPrevenir,
			IFNULL((
				SELECT GROUP_CONCAT(CONCAT(CUR.nom, '#', PAR.valeur, '#', CUR.annee_en_cours, '#', (
					SELECT GROUP_CONCAT(ENS.nom, ' ', ENS.prenom)
					FROM classe CLA
					INNER JOIN discipline DIS ON(DIS.id_discipline = CLA.id_discipline AND DIS.type = 'principale')
					INNER JOIN classe_enseignant CLA_ENS ON(CLA_ENS.id_classe = CLA.id_classe AND CLA_ENS.role = 'professeur' AND CLA_ENS.debut <='".date('Y-m-d')."'
						AND CLA_ENS.fin >='".date('Y-m-d')."' )
					INNER JOIN enseignant ENS ON (
						ENS.id_enseignant = CLA_ENS.id_enseignant)
					WHERE CLA.id_classe = CUR.id_classe

					AND (CUR.statut != 'demission' AND CUR.statut != 'radiation' AND CUR.statut != 'termine')
                    AND (CUR.date_fin IS NULL OR CUR.date_fin = '0000-00-00')

				)) SEPARATOR '|')
				FROM etudiant_cursus CUR
				LEFT JOIN parametre PAR ON CUR.statut=PAR.code AND PAR.`type`='etudiant_cursus_statut'
				WHERE CUR.id_etudiant = ETU.id_etudiant
				ORDER BY CUR.date_entree DESC
			),'aucun cursus en cours') AS sInfosCursus, 

			DATE_FORMAT(ETU.naissance_date, '%d/%m/%Y') as dDateNaissance, IFNULL(ETU.naissance_ville,'') as sNaissanceVille, (
				CASE 
					WHEN PPI.id_pays != 68
					THEN PPI.valeur
					ELSE ETU.naissance_code_postal
				END
			) AS sLieuxNaissance
			FROM etudiant ETU
			INNER JOIN etudiant_cursus CUR ON(CUR.id_etudiant = ETU.id_etudiant AND CUR.archive=0)
			LEFT JOIN param_pays_insee as PPI ON(ETU.naissance_pays_id = PPI.id_pays)
			WHERE ETU.archive=0 
			AND ETU.type != 'formation_continue_non_diplomante'
			AND IFNULL(CUR.date_fin, '0000-00-00')<='".date('Y-m-d')."'
			AND CUR.statut NOT LIKE 'termine%'
			AND CUR.statut != 'demission'
			AND CUR.statut != 'radiation'
			GROUP BY ETU.numero_etudiant
			ORDER BY ETU.nom ASC, ETU.prenom ASC
		";
			 //WHERE ETU.numero_etudiant = '201890026'
			// LIMIT 0, 24
		// die($sRequete);
		$aResultats = $this->aSelectBDD($sRequete, $this->aMappingChamps);

		return $aResultats;
	}

	/**
	 * Change la raison du refus d'une inscription administrative
	 *
	 * @return 	bool	$bRetour 	Retour execution requête
	 */
	public function bUpdateRaisonRefus() {

		$bRetour = false;

		$sRequete = "

			UPDATE etudiant
			SET insc_adm_etat_info = '".addslashes($this->sDescriptionEtatInfo)."'
			WHERE id_etudiant = '".$this->nIdEtudiant."'
		";

		$rLien = $this->rConnexion->query($sRequete);

		if ($rLien) {
			$bRetour = true;
			//$this->bSetLog('delete_coordoonnee', $this->nIdEtudiant);
		} else {
			$this->sMessagePDO = $this->rConnexion->sMessagePDO;
		}

		return $bRetour;
	}

	/**
	 * Récupérer les cursus
	 */
	public function aRecupereCursusEtudiant($nIdEtudiant = 0)
	{
		$sRetour = "";
		if ($nIdEtudiant) {
			$sRequete = "
				SELECT id_etudiant, GROUP_CONCAT(TRIM(CONCAT(nom, ' ', UPPER(annee_en_cours), ' ', IF(etudiant_cursus.statut='normal', '', IFNULL(PAR2.valeur, '')))) ORDER BY nom SEPARATOR ' / ') AS cursus"
				." FROM etudiant_cursus"
				." LEFT JOIN parametre PAR2 ON PAR2.code=etudiant_cursus.statut AND PAR2.`type`='etudiant_cursus_statut'"
				." WHERE id_etudiant=".$nIdEtudiant
				." GROUP BY id_etudiant";
			$aEtudiantCursus = $this->aSelectBDD($sRequete);
			if ($aEtudiantCursus[0]->cursus) {
				$sRetour = $aEtudiantCursus[0]->cursus;
			}
		}
		return $sRetour;
	}

	/**
	 * mise à jour des frais de scolarité
	 *
	 * @return 	bool	$bRetour 	Retour execution requête
	 */
	public function bMajFraisSco($nIdEtudiant = 0, $nInscAdmMontant = 0, $nInscAdmMontantSco = 0, $nInscAdmMontantMedia = 0, $nInscAdmMontantPeda = 0) {
		$bRetour = false;
		if ($nIdEtudiant) {
			$sRequete = "
				UPDATE etudiant SET
				insc_adm_montant = '".$nInscAdmMontant."',
				insc_adm_montant_sco = '".$nInscAdmMontantSco."',
				insc_adm_montant_media = '".$nInscAdmMontantMedia."',
				insc_adm_montant_peda = '".$nInscAdmMontantPeda."'
				WHERE id_etudiant = '".$nIdEtudiant."'
			";
	
			$rLien = $this->rConnexion->query($sRequete);
	
			if ($rLien) {
				$bRetour = true;
				//$this->bSetLog('delete_coordoonnee', $this->nIdEtudiant);
			} else {
				$this->sMessagePDO = $this->rConnexion->sMessagePDO;
			}
		}

		return $bRetour;
	}

	/**
	 * préparer une nouvelle IA
	 *
	 * @param 	int		id de l'étudiant
	 *
	 * @return 	bool	$bRetour 	Retour execution requête
	 */
	public function aPreparerNouvelleIA($nIdEtudiant = 0)
	{
		$bRetour = false;
		if ($nIdEtudiant) {
			// on vide ou remet à 0 certains champs 
			$sRequete = "UPDATE etudiant SET"
				." cvec_numero_attestation='',"
				." insc_adm_cas_particulier=0,"
				." insc_adm_etat='sans_document',"
				." insc_adm_etat_date=NULL,"
				." insc_adm_etat_info='',"
				." insc_adm_paiement_autorise=0,"
				." bourse_type='',"
				." bourse_echelon='',"
				." situation_annee_precedente='',"
				." insc_adm_montant_sco=0,"
				." insc_adm_montant_media=0,"
				." insc_adm_montant_peda=0,"
				." insc_adm_montant=0"
				." WHERE id_etudiant=".$nIdEtudiant;
			$rlien = $this->rConnexion->query($sRequete);
			if ($rLien) {
				$bRetour = true;
			}
		}
		return $bRetour;
	}

	/**
	 * Récupération de la liste des étudiants.
	 *
	 * @return array
	 */
	public function aRecupereListeCreneau($nIdEnseignant = 0, $nSemestre = 0)
	{
		$aRetour = array();

		if ($aIdEtudiant) {
			$sRequete = "SELECT DISTINCT ETU.id_etudiant AS nIdEtudiant, ETU.nom_usage AS sNomUsage, ETU.prenom AS sPrenom, CUR.nom AS sCursus,
			PAR1.valeur AS sCycle, PAR2.valeur AS sAnnee, PAR3.valeur AS sCategorieDiscipline, COO.email AS sEmail, ECGD.id_planning_enseignant_discipline_creneau AS nIdCreneau".
			"FROM etudiant ETU
				LEFT JOIN coordonnee COO ON ETU.id_etudiant=COO.id_etudiant AND COO.`type`='principal'
			INNER JOIN etudiant_cursus CUR ON CUR.id_etudiant=ETU.id_etudiant
			LEFT JOIN parametre PAR1 ON CUR.cycle=PAR1.code AND PAR1.type='cursus_cycle'
				LEFT JOIN parametre PAR2 ON CUR.annee_en_cours=PAR2.code AND PAR2.type='cursus_grille_annee'
			INNER JOIN etudiant_cursus_grille ECG ON CUR.id_etudiant_cursus=ECG.id_etudiant_cursus
			INNER JOIN etudiant_cursus_grille_discipline ECGD ON ECG.id_etudiant_cursus_grille=ECGD.id_etudiant_cursus_grille
				LEFT JOIN parametre PAR3 ON ECGD.categorie=PAR3.code AND PAR3.type='cursus_grille_discipline_categorie'
			
				LEFT JOIN planning_enseignant_discipline_creneau PEDC
				ON PEDC.id_planning_enseignant_discipline_creneau = ECGD.id_planning_enseignant_discipline_creneau
				LEFT JOIN planning_enseignant_discipline PED ON PED.id_planning_enseignant_discipline = PEDC.id_planning_enseignant_discipline
				WHERE PED.id_enseignant = 381(".$nIdEnseignant.")";	

			if ($bValidesUniquement) {
				$sRequete .=  " AND ECGD.validation IN ('gestionnaire')";
			}
			if ($nSemestre) {
				$sRequete .=  " AND ECG.semestre=".$nSemestre;
			}

			$sRequete .= " ORDER BY ECGD.id_planning_enseignant_discipline_creneau, ETU.nom_usage, ETU.prenom";
			// echo $sRequete."\r\n";
			$aRetour = $this->aSelectBDD($sRequete);
		}
		return $aRetour;
	}

	/**
	 * archivage des étudiants dont date est dépassée
	 * @return boolean
	 */
	public function bArchivageParLot() {
		$bRetour = false;
		$sRequete = 'UPDATE `etudiant` SET `archive`=1 WHERE IFNULL(`archive_date`, "0000-00-00")!="0000-00-00" AND `archive_date` < NOW() AND archive=0';
		// echo $sRequete."\r\n";
		$rLien = $this->rConnexion->query($sRequete);
		if ($rLien) {
			$bRetour = true;
		}
		return $bRetour;
	}
}