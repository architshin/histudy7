<?php

/**
 * 注文情報エンティティクラス。
 * 
 * @author Shinzo SAITO
 *
 */
class OrderEntity {
	/**
	 * 注文コード
	 * @var integer
	 */
	private $_odCode;
	
	/**
	 * 注文日時
	 */
	private $_odDate;
	
	/**
	 * 注文合計金額
	 * @var integer
	 */
	private $_odTotal;
	
	/**
	 * 注文者氏名
	 * @var string
	 */
	private $_odName;
	
	/**
	 * 注文者住所
	 * @var string
	 */
	private $_odAddress;
	
	/**
	 * 注文者電話番号
	 * @var string
	 */
	private $_odTel;
	
	/**
	 * @return integer 注文コード 
	 */
	public function getOdCode() {
		return $this->_odCode;
	}
	
	/**
	 * @param integer $odCode 注文コード
	 */
	public function setOdCode($odCode) {
		$this->_odCode = $odCode;
	}
	
	/**
	 * @return mixed 注文日時
	 */
	public function getOdDate() {
		return $this->_odDate;
	}
	
	/**
	 * @param mixed $odDate 注文日時
	 */
	public function setOdDate($odDate) {
		$this->_odDate = $odDate;
	}
	
	/**
	 * @return integer 注文合計金額
	 */
	public function getOdTotal() {
		return $this->_odTotal;
	}
	
	/**
	 * @param integer $odTotal 注文合計金額
	 */
	public function setOdTotal($odTotal) {
		$this->_odTotal = $odTotal;
	}
	
	/**
	 * @return string 注文者氏名
	 */
	public function getOdName() {
		return $this->_odName;
	}
	
	/**
	 * @param string $odName 注文者氏名
	 */
	public function setOdName($odName) {
		$this->_odName = $odName;
	}
	
	/**
	 * @return string 注文者住所
	 */
	public function getOdAddress() {
		return $this->_odAddress;
	}
	
	/**
	 * @param string $odAddress 注文者住所
	 */
	public function setOdAddress($odAddress) {
		$this->_odAddress = $odAddress;
	}
	
	/**
	 * @return string 注文者電話番号
	 */
	public function getOdTel() {
		return $this->_odTel;
	}
	
	/**
	 * @param string $odTel 注文者電話番号
	 */
	public function setOdTel($odTel) {
		$this->_odTel = $odTel;
	}
}
?>