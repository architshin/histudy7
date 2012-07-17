<?php
require_once("OrderEntity.class.php");

/**
 * テーブルordersのデータ操作を行うDAOクラス。
 *
 */
class OrderDAO {
	
	/**
	 * データソース
	 *
	 * @var PDO
	 */
	private $_db;
	
	/**
	 * コンストラクタ。データベースへの接続を行う。
	 *
	 */
	public function __construct() {
		$dsn = "mysql:host=localhost;dbname=histudy7";
		$username = "histudy";
		$password = "hihi";
		$this->_db = new PDO($dsn, $username, $password);
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	/**
	 * デストラクタ。データベースへの接続解除を行う。
	 *
	 */
	public function __destruct() {
		$this->_db = null;
	}
	
	/**
	 * 指定金額以上の注文情報を取得するメソッド。
	 *
	 * @param integer $odTotalFloor 注文合計下限
	 * @return array 各要素はOrderEntityオブジェクト
	 */
	public function findMoreThanOdTotalFloor($odTotalFloor) {
		$orderEntities = array();
		try {
			$this->_db->query("SET NAMES utf8;");
			$sql = "SELECT * FROM orders WHERE od_total>=:od_total ORDER BY od_total";
			$stmt = $this->_db->prepare($sql);
			
			$stmt->bindParam(":od_total", $odTotalFloor);
			$result = $stmt->execute();
			while($row = $stmt->fetch()) {
				$orderEntity = new OrderEntity();
				$odCode = $row['od_code'];
				$orderEntity->setOdCode($odCode);
				$orderEntity->setOdDate($row['od_date']);
				$orderEntity->setOdTotal($row['od_total']);
				$orderEntity->setOdName($row['od_name']);
				$orderEntity->setOdAddress($row['od_address']);
				$orderEntity->setOdTel($row['od_tel']);
				$orderEntities[$odCode] = $orderEntity;
			}
		}
		catch(PDOException $ex) {
			$expMessage = "<p>DB接続に失敗しました。<hr/>";
			$expMessage .= "例外の中身:Code=".$ex->getCode()."<br/>".$ex->getFile()."(".$ex->getLine()."): ".$ex->getMessage()."<br/>".$ex->getTraceAsString();
			print($expMessage);
		}
		return $orderEntities;
	}
	
	/**
	 * 主キーによる検索。
	 *
	 * @param integer $odCode 主キーである注文コード
	 * @return OrderEntity 引数に対応するレコードを表すオブジェクト。レコードがない場合は、空(newしただけ)のオブジェクト。
	 */
	public function findyByPK($odCode) {
		$orderEntity = new OrderEntity();
		try {
			$this->_db->query("SET NAMES utf8;");
			$sql = "SELECT * FROM orders WHERE od_code=:od_code";
			$stmt = $this->_db->prepare($sql);
			
			$stmt->bindParam(":od_code", $odCode);
			$result = $stmt->execute();
			while($row = $stmt->fetch()) {
				$orderEntity->setOdCode($row['od_code']);
				$orderEntity->setOdDate($row['od_date']);
				$orderEntity->setOdTotal($row['od_total']);
				$orderEntity->setOdName($row['od_name']);
				$orderEntity->setOdAddress($row['od_address']);
				$orderEntity->setOdTel($row['od_tel']);
			}
		}
		catch(PDOException $ex) {
			$expMessage = "<p>DB接続に失敗しました。<hr/>";
			$expMessage .= "例外の中身:Code=".$ex->getCode()."<br/>".$ex->getFile()."(".$ex->getLine()."): ".$ex->getMessage()."<br/>".$ex->getTraceAsString();
			print($expMessage);
		}
		return $orderEntity;
	}
}
?>
