<?php
class VideosManagerPDO extends VideosManager
{
  /**
   * Attribut contenant l'instance représentant la BDD.
   * @type PDO
   */
  protected $db;
  
  /**
   * Constructeur étant chargé d'enregistrer l'instance de PDO dans l'attribut $db.
   * @param $db PDO Le DAO
   * @return void
   */
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }
  
  /**
   * @see VideosManager::add()
   */
  protected function addVideo(Video $video)
  {
    $requete = $this->db->prepare('INSERT INTO videos SET auteurVideo = :auteurVideo, titreVideo = :titreVideo, contenuVideo = :contenuVideo, video = :video, dateAjoutVideo = NOW(), dateModifVideo = NOW()');
    
    $requete->bindValue(':titreVideo', $video->titreVideo());
    $requete->bindValue(':auteurVideo', $video->auteurVideo());
    $requete->bindValue(':contenuVideo', $video->contenuVideo());
    $requete->bindValue(':video', $video->video());
    
    $requete->execute();
  }
  
  /**
   * @see VideosManager::count()
   */
  public function countVideo()
  {
    return $this->db->query('SELECT COUNT(*) FROM videos')->fetchColumn();
  }
  
  /**
   * @see VideosManager::delete()
   */
  public function deleteVideo($idVideo)
  {
    $this->db->exec('DELETE FROM videos WHERE idVideo = '.(int) $idVideo);
  }
  
  /**
   * @see VideosManager::getList()
   */
  public function getListVideo($debut = -1, $limite = -1)
  {
    $sql = 'SELECT idVideo, auteurVideo, titreVideo, contenuVideo, video, dateAjoutVideo, dateModifVideo FROM videos ORDER BY idVideo DESC';
    
    // On vérifie l'intégrité des paramètres fournis.
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->db->query($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Video');
    
    $listVideos = $requete->fetchAll();

    // On parcourt notre liste de video pour pouvoir placer des instances de DateTime en guise de dates d'ajout et de modification.
    foreach ($listVideos as $video)
    {
      $video->setDateAjoutVideo(new DateTime($video->dateAjoutVideo()));
      $video->setDateModifVideo(new DateTime($video->dateModifVideo()));
    }
    
    $requete->closeCursor();
    
    return $listVideos;
  }

    public function lastVideo($debut = -1, $limite = -1){
      $sql = "SELECT * FROM videos ORDER BY idVideo DESC LIMIT 1";
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
      $requete = $this->db->query($sql);
      $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Video');
      $lastVideo = $requete->fetchAll();

      foreach ($lastVideo as $video) {
        $video->setDateAjoutVideo(new DateTime($video->dateAjoutVideo()));
        $video->setDateModifVideo(new DateTime($video->dateModifVideo()));
      }
      $requete->closeCursor();
      return $lastVideo;
  }
  
  /**
   * @see VideosManager::getUnique()
   */
  public function getUniqueVideo($idVideo)
  {
    $requete = $this->db->prepare('SELECT idVideo, auteurVideo, titreVideo, contenuVideo, video, dateAjoutVideo, dateModifVideo FROM videos WHERE idVideo = :idVideo');
    $requete->bindValue(':idVideo', (int) $idVideo, PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Video');

    $video = $requete->fetch();

    $video->setDateAjoutVideo(new DateTime($video->dateAjoutVideo()));
    $video->setDateModifVideo(new DateTime($video->dateModifVideo()));
    
    return $video;
  }
  
  /**
   * @see VideosManager::update()
   */
  protected function updateVideo(Video $video)
  {
    $requete = $this->db->prepare('UPDATE videos SET auteurVideo = :auteurVideo, titreVideo = :titreVideo, contenuVideo = :contenuVideo, video = :video, dateModifVideo = NOW() WHERE idVideo = :idVideo');
    
    $requete->bindValue(':titreVideo', $video->titreVideo());
    $requete->bindValue(':auteurVideo', $video->auteurVideo());
    $requete->bindValue(':contenuVideo', $video->contenuVideo());
    $requete->bindValue(':video', $video->video());
    $requete->bindValue(':idVideo', $video->idVideo(), PDO::PARAM_INT);
    
    $requete->execute();
  }


}
?>