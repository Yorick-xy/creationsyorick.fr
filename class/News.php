<?php
/**
 * @author  Yorick M.
 * @version 2.0
 */
class News
{
  protected $erreurs = [],
            $id,
            $auteur,
            $titre,
            $contenu,
            $image,
            $dateAjout,
            $dateModif;
  
  /**
   * Constantes relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode.
   */
  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;
  const IMAGE_INVALIDE = 4;
  
  /**
   * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
   * @param $valeurs array Les valeurs à assigner
   * @return void
   */
  public function __construct($valeurs = [])
  {
    if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
    {
      $this->hydrate($valeurs);
    }
  }
  
  /**
   * Méthode assignant les valeurs spécifiées aux attributs correspondant.
   * @param $donnees array Les données à assigner
   * @return void
   */
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur)
    {
      $methode = 'set'.ucfirst($attribut);
      
      if (is_callable([$this, $methode]))
      {
        $this->$methode($valeur);
      }
    }
  }
  
  /**
   * Méthode permettant de savoir si la news est nouvelle.
   * @return bool
   */
  public function isNew()
  {
    return empty($this->id);
  }
  
  /**
   * Méthode permettant de savoir si la news est valide.
   * @return bool
   */
  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu) || empty($this->image));
  }
  
  
  // SETTERS //
  
  public function setId($id)
  {
    $this->id = (int) $id;
  }
  
  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }
    else
    {
      $this->auteur = $auteur;
    }
  }
  
  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre))
    {
      $this->erreurs[] = self::TITRE_INVALIDE;
    }
    else
    {
      $this->titre = $titre;
    }
  }
  
  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }
    else
    {
      $this->contenu = $contenu;
    }
  }

  public function setImage($image)
  {
    if (!is_string($image) || empty($image))
    {
      $this->erreurs[] = self::IMAGE_INVALIDE;
    }
    else
    {
      $this->image = $image;
    }
  }
  
  public function setDateAjout(DateTime $dateAjout)
  {
    $this->dateAjout = $dateAjout;
  }
  
  public function setDateModif(DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }
  
  // GETTERS //
  
  public function erreurs()
  {
    return $this->erreurs;
  }
  
  public function id()
  {
    return $this->id;
  }
  
  public function auteur()
  {
    return $this->auteur;
  }
  
  public function titre()
  {
    return $this->titre;
  }
  
  public function contenu()
  {
    return $this->contenu;
  }
  
  public function image()
  {
    return $this->image;
  }

  public function dateAjout()
  {
    return $this->dateAjout;
  }
  
  public function dateModif()
  {
    return $this->dateModif;
  }
}
?>