<?php

namespace App\Classes;

require_once __DIR__ . '/DBManager.php';

class UserManager extends DBManager
{

	public function __construct()
	{
		parent::__construct();
		$this->tableName = 'user';
		$this->columns = ['id', 'email', 'password', 'user_type_id'];
	}

	// Public Methods

	public function passwordMatch($password, $confirm_password)
	{
		return $password == $confirm_password;
	}

	public function register($nome, $cognome, $email, $password, $musicType)
	{

		$result = $this->db->query("SELECT * FROM user WHERE email = '$email'");
		if (count($result) != 0) {
			return false;
		}

		$userId = $this->create([
			'nome' => $nome,
			'cognome' => $cognome,
			'email' => $email,
			'password' => md5($password),
			'music_type_id' => $musicType,
			'user_type_id' => 2
		]);

		return $userId;
	}

	public function login($email, $password)
	{
		$result = $this->db->query("
      SELECT *
      FROM user
      WHERE email = '$email'
      AND password = MD5('$password');
    ");

		if (count($result) > 0) {
			$user = (object) $result[0];

			$this->_setUser($user);
			return true;
		}

		return false;
	}

	public function getUserById($id)
	{
		if (empty($id) || !$id || !isset($id)) return null;
		$result = $this->db->query("SELECT * FROM user INNER JOIN music_type on music_type_id = music_type.id WHERE user.id = $id;");
		return $result[0] ?? null;
	}

	public function getUserByIdNoMusic($id)
	{
		$sql = "SELECT * FROM user WHERE id = $id";
		return $this->db->query($sql);
	}

	public function getEmailById($userId)
	{
		$sql = "SELECT email FROM user WHERE id = $userId";
		return $this->db->query($sql);
	}
	
	public function updateUser($userId, $nome, $cognome, $email, $musicType)
	{
		$sql = "UPDATE user SET nome = '$nome', cognome = '$cognome', email = '$email', music_type_id = $musicType WHERE id = $userId";
		return $this->db->execute($sql);
	}

	public function updateUserType($id, $nome, $cognome, $email, $user_type_id)
	{
		$sql = "UPDATE user SET nome = '$nome', cognome = '$cognome', email = '$email', user_type_id = $user_type_id WHERE id = $id";
		return $this->db->execute($sql);
	}

	public function getAllUser()
	{
		$sql = "SELECT * FROM user";
		return $this->db->query($sql);
	}

	public function getMusicTypeById($userId)
    {
        $sql = "SELECT music_type_id FROM user WHERE id = $userId";
        return $this->db->query($sql);
    }

	// Private Methods
	private function _setUser($user)
	{
		$userToStore = (object) [
			'id' => $user->id,
			'email' => $user->email,
			'is_admin' => $user->user_type_id == 1
		];
		$_SESSION['user'] = $userToStore;
	}
}
