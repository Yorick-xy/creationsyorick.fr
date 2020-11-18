<?php
class VideosManagerMySQLi extends VideosManager
{
  /**
   * Attribut contenant l'instance représentant la BDD.
   * @type MySQLi
   */
  protected $db;
  
  /**
   * Constructeur étant chargé d'enregistrer l'instance de MySQLi dans l'attribut $db.
   * @param $db MySQLi Le DAO
   * @return void
   */
  public function __construct(MySQLi $db)
  {
    $this->db = $db;
  }
  
  /**
   * @see NewsManager::add()
   */
  protected function addVideo(Video $video)
  {
    $requete = $this->db->prepare('INSERT INTO videos SET auteurVideo = ?, titreVideo = ?, contenuVideo = ?,video = ?, dateAjoutVideo = NOW(), dateModifVideo = NOW()');
    
    $requete->bind_param('sss', $video->auteurVideo(), $video->titreVideo(), $video->contenuVideo(), $video->video());
    
    $requete->execute();
  }
  
  /**
   * @see NewsManager::count()
   */
  public function countVideo()
  {
    return $this->db->query('SELECT idVideo FROM videos')->num_rows;
  }
  
  /**
   * @see NewsManager::delete()
   */
  public function deleteVideo($idVideo)
  {
    $idVideo = (int) $idVideo;
    
    $requete = $this->db->prepare('DELETE FROM videos WHERE idVideo = ?');
    
    $requete->bind_param('i', $idVideo);
    
    $requete->execute();
  }
  
  /**
   * @see NewsManager::getList()
   */
  public function getListVideo($debut = -1, $limite = -1)
  {
    $listVideos = [];
    
    $sql = 'SELECT idVideo, auteurVideo, titreVideo, contenuVideo, video, dateAjoutVideo, dateModifVideo FROM videos ORDER BY idVideo DESC';
    
    // On vérifie l'intégrité des paramètres fournis.
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->db->query($sql);
    
    while ($video = $requete->fetch_object('Video'))
    {
      $video->setDateAjoutVideo(new DateTime($video->dateAjout()));
      $video->setDateModifVideo(new DateTime($video->dateModif()));

      $listVideos[] = $video;
    }
    
    return $listVideos;
  }
  public function lastVideo($debut = -1, $limite = -1){
    $lastVideos = [];
    $sql = "SELECT * FROM videos ORDER BY idVideo DESC LIMIT 1";
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->db->query($sql);
    
    while ($video = $requete->fetch_object('Video'))
    {
      $video->setDateAjoutVideo(new DateTime($video->dateAjout()));
      $video->setDateModifVideo(new DateTime($video->dateModif()));

      $listVideos[] = $video;
    }
    
    return $listVideos;
  }
  
  /**
   * @see NewsManager::getUnique()
   */
  public function getUniqueVideo($idVideo)
  {
    $idVideo = (int) $idVideo;
    
    $requete = $this->db->prepare('SELECT idVideo, auteurVideo, titreVideo, contenuVideo, video, dateAjoutVideo, dateModifVideo FROM videos WHERE idVideo = ?');
    $requete->bind_param('i', $idVideo);
    $requete->execute();
    
    $requete->bind_result($idVideo, $auteurVideo, $titreVideo, $contenuVideo, $video, $dateAjoutVideo, $dateModifVideo);
    
    $requete->fetch();
    
    return new Video([
      'idVideo' => $idVideo,
      'auteurVideo' => $auteurVideo,
      'titreVideo' => $titreVideo,
      'contenuVideo' => $contenuVideo,
      'video' => $video,
      'dateAjoutVideo' => new DateTime($dateAjoutVideo),
      'dateModifVideo' => new DateTime($dateModifVideo)
    ]);
  }
  
  /**
   * @see NewsManager::update()
   */
  protected function updateVideo(Video $video)
  {
    $requete = $this->db->prepare('UPDATE videos SET auteurVideo = ?, titreVideo = ?, contenuVideo = ?, video = ?, dateModifVideo = NOW() WHERE idVideo = ?');
    
    $requete->bind_param('sssi', $video->auteurVideo(), $video->titreVideo(), $video->contenuVideo(), $video->video(), $video->idVideo());
    
    $requete->execute();
  }
}
?>