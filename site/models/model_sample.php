<?php


/**
* This is the model class 
*/
class model_admin extends model
{
	
	function __construct()
	{
		parent::__construct();
	}// End of constructor function

	public function addNews($title, $body, $band_id){
		$id=mt_rand();
		$title=$this->database->poof($title);
		$body=$this->database->poof($body);

		$sql="INSERT INTO news values ({$id}, '{$title}', '{$body}', {$band_id}, now())" ;

		return $this->database->perform_query($sql);

	}// End of function addNews

	public function addVideo($video_name, $video_link, $video_type, $band_id){
		$id="v_".mt_rand();
		$id=$this->database->poof($id);

		$video_name=$this->database->poof($video_name);
		$video_link=$this->database->poof($video_link);
		$video_type=$this->database->poof($video_type);

		$sql="INSERT INTO youtube_videos values ( ";
			$sql.="'{$id}', '{$video_name}', '{$video_link}', {$video_type}, {$band_id}, now())" ;
		return $this->database->perform_query($sql);

	}// End of function addVideo

	public function getAllnews($band_id){

		$sql="SELECT * from news where band_id={$band_id}";

		return $this->database->fetch_multiple_result($sql);
	}// End of function getAllnews

	public function getAllJamming($band_id){
		$sql="SELECT video_id, video_name, video_date from youtube_videos where band_id={$band_id} AND video_type=0";
		//echo $sql;
		return $this->database->fetch_multiple_result($sql);

	}

	public function delete($schema, $id, $col){

		$sql="DELETE FROM {$schema} where $col={$id}";
		return $this->database->perform_query($sql);

	}

	public function concerts($concert_title, $concert_about, $concert_lat, $concert_lon, $concert_day, $band_id){

		$id="c_".mt_rand();
		$concert_title=$this->database->poof($concert_title);
		$concert_about=$this->database->poof($concert_about);
		$concert_lat=$this->database->poof($concert_lat);
		$concert_lon=$this->database->poof($concert_lon);
		$concert_day=$this->database->poof($concert_day);

		$sql="INSERT INTO concerts values('{$id}' , '{$concert_title}', '{$concert_about}', ";
			$sql.="'{$concert_lat}', '{$concert_lon}', '{$concert_day}', '{$band_id}')";
		
		return $this->database->perform_query($sql);

	}// End of function concerts

	public function getAllConcerts($band_id){

		/*
			This is the query for getting all the concerts currently happening aroung. 
		*/
		$band_id=$this->database->poof($band_id);
		$sql="SELECT * FROM concerts where concerts.band_id={$band_id}";
		return $this->database->fetch_multiple_result($sql);
	}

}