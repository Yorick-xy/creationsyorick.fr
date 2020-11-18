<?php
/**
 * @author  Yorick M.
 * @version 2.0
 */
class Video
{
  protected $erreursVideo = [],
            $idVideo,
            $auteurVideo,
            $titreVideo,
            $contenuVideo,
            $Video,
            $dateAjoutVideo,
            $dateModifVideo;
  
  /**
   * Constantes relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode.
   */
  const AUTEURVIDEO_INVALIDE = 1;
  const TITREVIDEO_INVALIDE = 2;
  const CONTENUVIDEO_INVALIDE = 3;
  const VIDEO_INVALIDE = 4;
  
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
  public function isVideo()
  {
    return empty($this->idVideo);
  }
  
  /**
   * Méthode permettant de savoir si la news est valide.
   * @return bool
   */
  public function isValidVideo()
  {
    return !(empty($this->auteurVideo) || empty($this->titreVideo) || empty($this->contenuVideo) || empty($this->Video));
  }
  
  
  // SETTERS //
  
  public function setIdVideo($idVideo)
  {
    $this->idVideo = (int) $idVideo;
  }
  
  public function setAuteurVideo($auteurVideo)
  {
    if (!is_string($auteurVideo) || empty($auteurVideo))
    {
      $this->erreursVideo[] = self::AUTEURVIDEO_INVALIDE;
    }
    else
    {
      $this->auteurVideo = $auteurVideo;
    }
  }
  
  public function setTitreVideo($titreVideo)
  {
    if (!is_string($titreVideo) || empty($titreVideo))
    {
      $this->erreursVideo[] = self::TITREVIDEO_INVALIDE;
    }
    else
    {
      $this->titreVideo = $titreVideo;
    }
  }
  
  public function setContenuVideo($contenuVideo)
  {
    if (!is_string($contenuVideo) || empty($contenuVideo))
    {
      $this->erreursVideo[] = self::CONTENUVIDEO_INVALIDE;
    }
    else
    {
      $this->contenuVideo = $contenuVideo;
    }
  }

  public function setVideo($Video)
  {
    if (!is_string($Video) || empty($Video))
    {
      $this->erreursVideo[] = self::VIDEO_INVALIDE;
    }
    else
    {
      $this->Video = $Video;
    }
  }
  
  public function setDateAjoutVideo(DateTime $dateAjoutVideo)
  {
    $this->dateAjoutVideo = $dateAjoutVideo;
  }
  
  public function setDateModifVideo(DateTime $dateModifVideo)
  {
    $this->dateModifVideo = $dateModifVideo;
  }
  
  // GETTERS //
  
  public function erreursVideo()
  {
    return $this->erreursVideo;
  }
  
  public function idVideo()
  {
    return $this->idVideo;
  }
  
  public function auteurVideo()
  {
    return $this->auteurVideo;
  }
  
  public function titreVideo()
  {
    return $this->titreVideo;
  }
  
  public function contenuVideo()
  {
    return $this->contenuVideo;
  }
  
  public function video()
  {
    return $this->Video;
  }

  public function dateAjoutVideo()
  {
    return $this->dateAjoutVideo;
  }
  
  public function dateModifVideo()
  {
    return $this->dateModifVideo;
  }
}
?>